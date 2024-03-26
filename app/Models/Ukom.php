<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Soal;
use App\Models\Hasil;
use App\Models\Ujian;
use App\Models\Riwayathasilujian;

class Ukom extends Model
{
    use HasFactory;
    protected $table = "ukom";
    protected $guarded = [];
    protected $primaryKey = "id";

    public function soal()
    {
        return $this->hasMany(Soal::class);
    }

    public function hasil()
    {
        return $this->hasMany(Hasil::class);
    }

    public function ujian()
    {
        return $this->hasMany(Ujian::class);
    }

    public function riwayathasilujian()
    {
        return $this->hasMany(Riwayathasilujian::class);
    }
}
