<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Login;
use App\Models\Ukom;
use App\Models\Riwayathasilujian;

class Soal extends Model
{
    use HasFactory;
    protected $table = "soal";
    protected $guarded = [];
    protected $primaryKey = "id";

    public function ukom()
    {
        return $this->belongsTo(Ukom::class);
    }

    public function Riwayathasilujian()
    {
        return $this->hasMany(Riwayathasilujian::class);
    }
}
