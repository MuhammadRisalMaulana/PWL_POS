<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransaksiModel extends Model
{
    use HasFactory;

    protected $table = 't_penjualan';

    // Primary key tabel
    protected $primaryKey = 'penjualan_id';

    // Menentukan apakah model harus menggunakan timestamp (created_at dan updated_at)
    public $timestamps = false;

    // Atribut yang dapat diisi massal
    protected $fillable = [
        'user_id',
        'pembeli',
        'penjualan_kode',
        'penjualan_tanggal'
    ];

    // Relasi ke model User
    public function user()
    {
        return $this->belongsTo(UserModel::class, 'user_id','user_id');
    }

}
