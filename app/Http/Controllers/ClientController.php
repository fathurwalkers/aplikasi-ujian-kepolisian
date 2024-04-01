<?php

namespace App\Http\Controllers;

use App\Jobs\ProsesSoalReguler;
use App\Models\Data;
use App\Models\Hasil;
use App\Models\Login;
use App\Models\Riwayathasilujian;
use App\Models\Soal;
use App\Models\Ujian;
use App\Models\Ukom;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Hash;

class ClientController extends Controller
{
    protected $users;

    public function __construct()
    {
        $this->users = session('data_login');
    }

    public function index()
    {
        if ($this->users == "admin") {
            return redirect()->route('dashboard')->with('status', 'Maaf anda tidak punya akses ke halaman ini.');
        }
        return view('client.index');
    }

    public function client_profile()
    {

        $users = session('data_login');
        if ($this->users == "admin") {
            return redirect()->route('dashboard')->with('status', 'Maaf anda tidak punya akses ke halaman ini.');
        }
        $login = Login::find($users->id);
        return view('client.client-profile', [
            'login' => $login,
        ]);
    }

    public function client_edit_profile(Request $request)
    {
        $users = session('data_login');
        if ($this->users == "admin") {
            return redirect()->route('dashboard')->with('status', 'Maaf anda tidak punya akses ke halaman ini.');
        }
        $login = Login::find($users->id);

        $hashPassword = Hash::make($request->login_password, [
            'rounds' => 12,
        ]);

        $login->update([
            'login_nama' => $request->login_nama,
            'login_username' => $request->login_username,
            'login_email' => $request->login_email,
            'login_telepon' => $request->login_telepon,
            'login_password' => $hashPassword,
            'updated_at' => now(),
        ]);

        return redirect()->route('client-profile')->with('status', 'Profile user berhasil di update!');
    }

    public function calculateScore($jumlahJawabanBenar, $jumlahJawabanSalah, $bobotNilaiBenar, $totalSoal)
    {
        $skorDiperoleh = ($jumlahJawabanBenar * $bobotNilaiBenar) - ($jumlahJawabanSalah * 0);
        $totalSkorMaksimum = $totalSoal * $bobotNilaiBenar;
        $persentaseSkor = ($skorDiperoleh / $totalSkorMaksimum) * 100;
        return $persentaseSkor;
    }

    public function client_daftar_hasil_ujian()
    {
        $session_users = session('data_login');
        $login = Login::find($session_users->id);
        $data = Data::where('login_id', $login->id)->firstOrFail();
        $ukom = Ukom::all();
        $riwayathasilujian = Riwayathasilujian::where('data_id', $data->id)->get();
        $array_riwayat = $riwayathasilujian;
        $count_riwayathasilujian = $riwayathasilujian;
        $hasil = Hasil::all();
        if ($hasil->isNotEmpty()) {
            return view('client.client-daftar-hasil-ujian', [
                'data' => $data,
                'login' => $login,
                'ukom' => $ukom,
                'riwayathasilujian' => $riwayathasilujian,
                'hasil' => $hasil,
            ]);
        }
        if ($hasil->isEmpty()) {
            return redirect()->route('client-index')->with('status', 'Maaf, anda belum melakukan ujian apapun, silahkan mengikuti salah satu ujian untuk dapat melihat hasil ujian anda.');
        }
        return redirect()->route('client-index')->with('status', 'Maaf, anda belum melakukan ujian apapun, silahkan mengikuti salah satu ujian untuk dapat melihat hasil ujian anda.');
    }

    public function client_pilih_ukom()
    {
        $ujian = Ujian::all()->toArray();
        $array_kosong = [];
        foreach ($ujian as $uj) {
            $array_kosong = Arr::prepend($array_kosong, $uj["ukom_id"]);
        }
        $ukom = Ukom::findMany($array_kosong);
        return view('client.client-pilih-ukom', [
            'ukom' => $ukom,
        ]);
    }

    public function client_konfirmasi_token_ujian($id)
    {
        $id_ukom = $id;
        $ukom = Ukom::find($id_ukom);
        $hasil = Hasil::where('ukom_id', $ukom->id)->get();
        // if ($hasil->isNotEmpty()) {
        //     return redirect()->route('client-pilih-ukom')->with('status', 'Maaf, anda sudah menyelesaikan ujian ini.');
        // }
        // if ($hasil->isEmpty()) {
        $soal = Soal::where('ukom_id', $ukom->id)->get()->count();
        return view('client.client-konfirmasi-token-ujian', [
            'ukom' => $ukom,
            'soal' => $soal,
        ]);
        // }
        // return redirect()->route('client-pilih-ukom')->with('status', 'Maaf, halaman yang anda tuju tidak tersedia.');
    }

    public function client_post_konfirmasi_token_ujian(Request $request, $id)
    {
        $id_ukom = $id;
        $ukom = Ukom::find($id_ukom);
        $request_token = strtoupper($request->ukom_kode);
        $temp_true = true;
        // if ($request_token == $ukom->ukom_kode) {
        if ($temp_true == true) {
            $soal = Soal::where('ukom_id', $ukom->id)->get();
            switch ($ukom->ukom_kategori) {
                case "kecermatan":
                    return redirect()->route('client-ujian-kecermatan', $ukom->id);
                    break;
                case "reguler":
                    return redirect()->route('client-ujian-reguler', $ukom->id);
                    break;
                case "kepribadian":
                    return redirect()->route('client-ujian-reguler', $ukom->id);
                    break;
                case "kecerdasan":
                    return redirect()->route('client-ujian-reguler', $ukom->id);
                    break;
                case "campur":
                    return redirect()->route('client-ujian-reguler', $ukom->id);
                    break;
            }
        } else {
            return redirect()->route('client-konfirmasi-token-ujian', $ukom->id)->with('status', 'Token salah. silahkan masukkan token yang benar untuk ujian ini.');
        }
    }

    public function client_ujian_kecermatan($id)
    {
        $id_ukom = $id;
        $ukom = Ukom::find($id_ukom);
        $soal = Soal::where('ukom_id', $ukom->id)->paginate(1);
        $soal1 = Soal::where('ukom_id', $ukom->id)->paginate(1);
        $soal_petunjuk = Soal::where('ukom_id', $ukom->id)->first();
        $petunjuk_original = Soal::where('ukom_id', $ukom->id)->first();
        $before_array = $petunjuk_original->soal_kecermatan_original_isi;
        $petunjuk = mb_str_split($before_array);
        $soal_count = Soal::where('ukom_id', $ukom->id)->count();
        $index_count = 1;
        $ujian = Ujian::where('ukom_id', $ukom->id)->first();

        $detik = $ujian->ujian_menit * 60;
        return view('client.client-ujian-kecermatan', [
            'ukom' => $ukom,
            'soal' => $soal,
            'soal1' => $soal1,
            'petunjuk' => $petunjuk,
            'soal_count' => $soal_count,
            'index_count' => $index_count,
            'id_ukom' => $id_ukom,
            'detik' => $detik,
        ]);
    }

    public function client_proses_ujian_kecermatan(Request $request)
    {
        $session_users = session('data_login');
        $login = Login::find($session_users->id);
        $users = Data::where('login_id', $login->id)->firstOrFail();

        $cek_url = $request->urlredirect;
        $array_jawaban = $request->arrayjawaban;
        $ppp = $request->cekval;
        $index_page = intval($request->indexpage);
        $explode_soal = explode(":", $ppp);
        $soal = Soal::find($explode_soal[1]);
        $ukom = Ukom::find($soal->ukom_id);

        if ($soal->soal_jawaban == $explode_soal[0]) {
            $cek_val = "BENAR";
        } else {
            $cek_val = "SALAH";
        }

        $riwayat_hasil = new Riwayathasilujian;
        $save_riwayat_hasil = $riwayat_hasil->create([
            'riwayat_jawaban_peserta' => $explode_soal[0],
            'riwayat_jawaban_soal' => $soal->soal_jawaban,
            'riwayat_bobot_nilai' => $soal->soal_bobot_nilai,
            'data_id' => $users->id,
            'soal_id' => $soal->id,
            'ukom_id' => $ukom->id,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        $save_riwayat_hasil->save();

        $cek_val = $save_riwayat_hasil;
        return response()->json([
            'cek_val' => $cek_val,
            'cek_url' => $cek_url,
            'array_jawaban' => $array_jawaban,
            'index_page' => $index_page,
        ]);
    }

    public function client_ujian_reguler($id)
    {
        $id_ukom = $id;
        $ukom = Ukom::find($id_ukom);
        $soal = Soal::where('ukom_id', $ukom->id)->get();
        $soal_count = Soal::where('ukom_id', $ukom->id)->count();
        $ujian = Ujian::where('ukom_id', $ukom->id)->first();

        $detik = $ujian->ujian_menit * 60;
        return view('client.client-ujian-reguler', [
            'ukom' => $ukom,
            'soal' => $soal,
            'detik' => $detik,
        ]);
    }

    public function client_post_cek_ujian(Request $request, $id)
    {
        $session_users = session('data_login');
        $login = Login::find($session_users->id);
        $users = Data::where('login_id', $login->id)->firstOrFail();
        $id_ukom = $id;
        $ukom = Ukom::find($id_ukom);
        $soal = Soal::where('ukom_id', $ukom->id)->get();
        $soal_count = Soal::where('ukom_id')->count();
        $jawaban_benar = 0;
        $jawaban_salah = 0;
        foreach ($soal as $item) {
            $nama_request = "requestsoal" . $item->id;
            $cek_jawaban = $request->input($nama_request);
            $cek_jawaban_soal = $item->soal_jawaban;
            $array_hasil = [
                'jawaban_peserta' => $cek_jawaban,
                'jawaban_benar' => $cek_jawaban_soal,
                'jawaban_bobot_nilai' => $item->soal_bobot_nilai,
                'data_id' => $users->id,
                'soal_id' => $item->id,
                'ukom_id' => $item->ukom_id,
            ];
            dispatch(new ProsesSoalReguler($array_hasil));
        }
        return redirect()->route('client-proses-hasil-ujian', [$ukom->id, $users->id]);
    }

    public function client_proses_hasil_ujian($ukomid, $dataid)
    {
        $session_users = session('data_login');
        $users = Login::find($session_users->id);
        $ukom_id = $ukomid;
        $data_id = $dataid;
        $ukom = Ukom::find($ukom_id);
        $data = Data::find($data_id);
        return view('client.client-proses-hasil-ujian', [
            'users' => $users,
            'ukom' => $ukom,
            'data' => $data,
        ]);
    }

    public function client_proses_hasil_ujian_kecermatan($ukomid, $dataid)
    {
        $session_users = session('data_login');
        $users = Login::find($session_users->id);
        $ukom_id = $ukomid;
        $data_id = $dataid;
        $ukom = Ukom::find($ukom_id);
        $data = Data::where('login_id', $users->id)->first();
        $riwayathasilujian = Riwayathasilujian::where(['ukom_id' => $ukom->id, 'data_id' => $data->id])->get();
        return view('client.client-proses-hasil-ujian', [
            'users' => $users,
            'ukom' => $ukom,
            'data' => $data,
        ]);
    }

    public function client_hasil_ujian($ukomid, $dataid)
    {
        $session_users = session('data_login');
        $users = Login::find($session_users->id);
        $ukom_id = $ukomid;
        $data_id = $dataid;
        $ukom = Ukom::find($ukom_id);
        $data = Data::find($data_id);
        $soal = Soal::where('ukom_id', $ukom->id)->get();
        $soal2 = Soal::where('ukom_id', $ukom->id)->get()->reverse();
        $soal_count = Soal::where('ukom_id', $ukom->id)->get()->count();
        $riwayathasilujian = Riwayathasilujian::where(['ukom_id' => $ukom->id, 'data_id' => $data->id])->get();
        $jawaban_benar = 0;
        $jawaban_salah = 0;
        $bobot_nilai = 0;

        $array_hasil_soal = array();
        $iter = 1;
        foreach ($soal as $pecah) {
            $cari_riwayat = Riwayathasilujian::where('data_id', "=", $data->id)->where('ukom_id', "=", $ukom->id)->where('soal_id', "=", $pecah->id)->get();
            // $cari_riwayat = Riwayathasilujian::where('data_id', "=", 1)->where('ukom_id', "=", 2)->where('soal_id', "=", 2)->get();
            if ($cari_riwayat->count() > 0) {
                $array_hasil_soal['iter'][] = $iter++;
                $array_hasil_soal['jawaban_user'][] = $cari_riwayat[0]->riwayat_jawaban_peserta;
                $array_hasil_soal['jawaban_soal'][] = $cari_riwayat[0]->riwayat_jawaban_soal;
                $array_hasil_soal['isi_soal'][] = $pecah->soal_isi;
                $array_hasil_soal['original_soal'][] = $pecah->soal_kecermatan_original_isi;

                if ($cari_riwayat[0]->riwayat_jawaban_peserta == $cari_riwayat[0]->riwayat_jawaban_soal) {
                    $array_hasil_soal['pencocokan'][] = true;
                    $jawaban_benar += 1;
                    $bobot_nilai += $cari_riwayat[0]->riwayat_bobot_nilai;
                } else {
                    $array_hasil_soal['pencocokan'][] = false;
                    $jawaban_salah += 1;
                    $bobot_nilai += 0;
                }
                $array_hasil_soal['id_soal'][] = $pecah->id;
            } else {
                $array_hasil_soal['iter'][] = $iter++;
                $array_hasil_soal['jawaban_user'][] = null;
                $array_hasil_soal['jawaban_soal'][] = null;
                $array_hasil_soal['isi_soal'][] = $pecah->soal_isi;
                $array_hasil_soal['original_soal'][] = $pecah->soal_kecermatan_original_isi;
                $array_hasil_soal['pencocokan'][] = false;
                $array_hasil_soal['id_soal'][] = $pecah->id;
                $jawaban_salah += 1;
                $bobot_nilai += 0;
            }
        }
        // dd($array_hasil_soal);
        $new_hasil = new Hasil;
        $save_hasil = $new_hasil->create([
            'hasil_total_nilai' => intval($bobot_nilai),
            'hasil_benar' => intval($jawaban_benar),
            'hasil_salah' => intval($jawaban_salah),
            'data_id' => $data->id,
            'ukom_id' => $ukom->id,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        $save_hasil->save();
        $hasil = Hasil::find($save_hasil->id);

        switch ($ukom->ukom_kategori) {
            case 'reguler' && 'kepribadian' && 'kecerdasan':
                $array_hasil_count = count($array_hasil_soal);
                return view('client.client-hasil-ujian', [
                    'users' => $users,
                    'ukom' => $ukom,
                    'data' => $data,
                    'soal' => $soal,
                    'soal_count' => $soal_count,
                    'hasil' => $hasil,
                    'array_hasil_soal' => $array_hasil_soal,
                    'array_hasil_count' => $array_hasil_count,
                ]);
                break;
            case 'kecermatan':
                return view('client.client-hasil-ujian-kecermatan', [
                    'users' => $users,
                    'ukom' => $ukom,
                    'data' => $data,
                    'soal' => $soal,
                    'soal_count' => $soal_count,
                    'hasil' => $hasil,
                    'array_hasil_soal' => $array_hasil_soal,
                ]);
                break;
        }
    }
}
