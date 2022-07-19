<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Login;
use App\Models\Ukom;

class Soal extends Model
{
    use HasFactory;
    protected $table = "soal";
    protected $guarded = [];
    protected $primaryKey = "id";

    // public function login()
    // {
    //     return $this->belongsTo(Login::class);
    // }

    public function ukom()
    {
        return $this->belongsTo(Ukom::class);
    }
}
