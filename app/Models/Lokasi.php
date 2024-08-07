<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lokasi extends Model
{
    use HasFactory;

    protected $table = 'lokasi'; // Nama tabel yang digunakan
    protected $fillable = ['nama_lokasi']; // Kolom yang dapat diisi secara massal
}
