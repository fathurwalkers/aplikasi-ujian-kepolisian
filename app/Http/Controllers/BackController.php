<?php

namespace App\Http\Controllers;

use App\Models\Data;
use App\Models\Login;
use App\Models\Ujian;
use App\Models\Ukom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class BackController extends Controller
{
    protected $users;

    public function __construct()
    {
        $this->users = session('data_login');
    }

    public function data_akun()
    {
        $akun = Data::all();
        return view('akun.data-akun', [
            'akun' => $akun,
        ]);
    }

    public function profile()
    {
        $users = session('data_login');
        if ($users->login_level == "user") {
            return redirect()->route('client-index')->with('status', 'Maaf anda tidak punya akses ke halaman ini.');
        }
        $login = Login::find($users->id);
        return view('dashboard.profile', [
            'login' => $login,
        ]);
    }

    public function edit_profile(Request $request)
    {
        $users = session('data_login');
        if ($users->login_level == "user") {
            return redirect()->route('client-index')->with('status', 'Maaf anda tidak punya akses ke halaman ini.');
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

        return redirect()->route('profile')->with('status', 'Profile user berhasil di update!');
    }

    public function hapus_akun(Request $request)
    {
        $akun_id = $request->hapus_id;
        $akun = Data::find($akun_id);
        $login = Login::find($akun->login_id);
        $alert = "Berhasil menghapus Data Akun : " . $akun->data_nama;
        $login->forceDelete();
        return redirect()->route('data-akun')->with('status', $alert);
    }

    public function index()
    {
        $users = session('data_login');
        if ($users->login_level == "user") {
            return redirect()->route('client-index')->with('status', 'Maaf anda tidak punya akses ke halaman ini.');
        }
        $pengguna = Login::where('login_level', 'user')->count();
        $ujian = Ujian::all()->count();
        $ukom = Ukom::all()->count();

        return view('dashboard.index', [
            'pengguna' => $pengguna,
            'ujian' => $ujian,
            'ukom' => $ukom,
        ]);
    }

    public function login_admin()
    {
        $users = session('data_login');
        if ($users == null) {
            return view('login-admin');
        } else {
            if ($users->login_level == "user") {
                return redirect()->route('client-index')->with('status', 'Maaf anda tidak punya akses ke halaman ini.');
            }
            return redirect()->route('dashboard')->with('status', 'Maaf anda tidak punya akses ke halaman ini.');

        }
    }

    public function login_client()
    {
        $users = session('data_login');
        if ($users) {
            return redirect()->route('client-index');
        }
        return view('login-client');
    }

    public function logout(Request $request)
    {
        $cek_logout_request = $request->logoutrequest;
        switch ($cek_logout_request) {
            case 'ADMIN':
                $users = session('data_login');
                $request->session()->forget(['data_login']);
                $request->session()->flush();
                return redirect()->route('login-admin')->with('status', 'Anda telah logout!');
                break;
            case 'CLIENT':
                $users = session('data_login');
                $request->session()->forget(['data_login']);
                $request->session()->flush();
                return redirect()->route('login-client')->with('status', 'Anda telah logout!');
                break;
        }
    }

    public function post_login(Request $request)
    {
        $cek_request = $request->cekrequest;
        $cari_user = Login::where('login_username', $request->login_username)->first();
        if ($cari_user == null) {
            return back()->with('status', 'Maaf username atau password salah!')->withInput();
        }
        $data_login = Login::where('login_username', $request->login_username)->firstOrFail();
        switch ($data_login->login_level) {
            case 'admin':
                if ($cek_request == "client") {
                    return redirect()->route('login-client')->with('status', 'Maaf anda tidak dapat memasukkan akun user pada halaman administrator!');
                }
                $cek_password = Hash::check($request->login_password, $data_login->login_password);
                if ($data_login) {
                    if ($cek_password) {
                        $users = session(['data_login' => $data_login]);
                        return redirect()->route('dashboard')->with('status', 'Berhasil Login!');
                    }
                }
                break;
            case 'user':
                if ($cek_request == "admin") {
                    return redirect()->route('login-admin')->with('status', 'Maaf anda tidak dapat memasukkan akun user pada halaman administrator!');
                }
                $cek_password = Hash::check($request->login_password, $data_login->login_password);
                if ($data_login) {
                    if ($cek_password) {
                        $users = session(['data_login' => $data_login]);
                        return redirect()->route('client-index')->with('status', 'Berhasil Login!');
                    }
                }
                break;
        }
        return back()->with('status', 'Maaf username atau password salah!')->withInput();
    }

    public function post_register(Request $request)
    {
        $login = Login::where("login_username", $request->login_username)->first();
        if ($login != null) {
            return back()->with('status', 'Maaf username yang anda masukkan sudah terdaftar')->withInput();
        }
        $validatedLogin = $request->validate([
            'login_nama' => 'required',
            'login_username' => 'required',
            'login_password' => 'required',
            'login_email' => 'required',
        ]);
        if ($validatedLogin["login_password"] !== $request->login_password2) {
            return back()->with('status', 'Password harus sama.')->withInput();
        }
        $hashPassword = Hash::make($validatedLogin["login_password"], [
            'rounds' => 12,
        ]);
        $token_raw = Str::random(16);
        $token = Hash::make($token_raw, [
            'rounds' => 12,
        ]);
        $level = "user";
        $login_status = "verified";
        $login_data = new Login;
        $save_login = $login_data->create([
            'login_nama' => $validatedLogin["login_nama"],
            'login_username' => $validatedLogin["login_username"],
            'login_password' => $hashPassword,
            'login_email' => $validatedLogin["login_email"],
            'login_telepon' => $request->login_telepon,
            'login_token' => $token,
            'login_level' => $level,
            'login_status' => $login_status,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        $save_login->save();

        $data = new Data;
        $save_data = $data->create([
            "data_nama" => $validatedLogin["login_nama"],
            "data_telepon" => $request->login_telepon,
            "data_jeniskelamin" => "L",
            "data_kode" => strtoupper(Str::random(8)),
            "created_at" => now(),
            "updated_at" => now(),
        ]);
        $save_data->save();
        $save_data->login()->associate($save_login->id);
        $save_data->save();

        return redirect()->route('login-client')->with('status', 'Berhasil melakukan registrasi!');
    }

    public function register()
    {
        return view('register');
    }
}
