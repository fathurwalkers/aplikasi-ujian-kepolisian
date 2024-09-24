<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Ukom;

class Ujian extends Model
{
    use HasFactory;
    protected $table = "ujian";
    protected $guarded = [];
    protected $primaryKey = "id";

    public function ukom()
    {
        return $this->belongsTo(Ukom::class);
    }
}
