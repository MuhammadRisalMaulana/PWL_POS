<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriModel extends Model
{
    use HasFactory;
   // Nama tabel di database
   protected $table = 'm_kategori';

   // Kolom yang bisa diisi (mass assignable)
   protected $fillable = [
       'kategori_kode',
       'kategori_nama'
   ];

   // Mengubah primary key default
   protected $primaryKey = 'kategori_id';

   // Jika tabel tidak menggunakan timestamps
   public $timestamps = false;
 
}
