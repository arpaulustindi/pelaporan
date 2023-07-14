<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Laporan extends Model{
    protected $fillable = [
        'nama','hp','detail','gambar','metadata'
    ];

    protected $hidden = [];
}
