<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Login;
use App\Models\Hasil;
use App\Models\Riwayathasilujian;

class Data extends Model
{
    use HasFactory;
    protected $table = "data";
    protected $guarded = [];
    protected $primaryKey = "id";

    public function login()
    {
        return $this->belongsTo(Login::class);
    }

    public function hasil()
    {
        return $this->hasMany(Hasil::class);
    }

    public function riwayathasilujian()
    {
        return $this->hasMany(Riwayathasilujian::class);
    }
}
