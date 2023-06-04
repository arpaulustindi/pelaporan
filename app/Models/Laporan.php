<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Laporan extends Model{
    protected $fillable = [
        'gambar','metadata'
    ];

    protected $hidden = [];
}
