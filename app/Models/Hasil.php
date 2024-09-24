<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Data;
use App\Models\Ukom;

class Hasil extends Model
{
    use HasFactory;
    protected $table = "hasil";
    protected $guarded = [];
    protected $primaryKey = "id";

    public function data()
    {
        return $this->belongsTo(Data::class);
    }

    public function ukom()
    {
        return $this->belongsTo(Ukom::class);
    }
}
