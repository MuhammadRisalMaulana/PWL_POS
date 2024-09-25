<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PenjualanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $penjualan = [
            ['penjualan_id' => 1, 'user_id' => 1, 'pembeli' => 'John Doe', 'penjualan_kode' => 'PJL001', 'penjualan_tanggal' => Carbon::now()],
            ['penjualan_id' => 2, 'user_id' => 1, 'pembeli' => 'Jane Smith', 'penjualan_kode' => 'PJL002', 'penjualan_tanggal' => Carbon::now()],
            ['penjualan_id' => 3, 'user_id' => 1, 'pembeli' => 'Alice Johnson', 'penjualan_kode' => 'PJL003', 'penjualan_tanggal' => Carbon::now()],
            ['penjualan_id' => 4, 'user_id' => 1, 'pembeli' => 'Bob Brown', 'penjualan_kode' => 'PJL004', 'penjualan_tanggal' => Carbon::now()],
            ['penjualan_id' => 5, 'user_id' => 1, 'pembeli' => 'Charlie Green', 'penjualan_kode' => 'PJL005', 'penjualan_tanggal' => Carbon::now()],
            ['penjualan_id' => 6, 'user_id' => 1, 'pembeli' => 'David White', 'penjualan_kode' => 'PJL006', 'penjualan_tanggal' => Carbon::now()],
            ['penjualan_id' => 7, 'user_id' => 1, 'pembeli' => 'Eva Black', 'penjualan_kode' => 'PJL007', 'penjualan_tanggal' => Carbon::now()],
            ['penjualan_id' => 8, 'user_id' => 1, 'pembeli' => 'Frank Blue', 'penjualan_kode' => 'PJL008', 'penjualan_tanggal' => Carbon::now()],
            ['penjualan_id' => 9, 'user_id' => 1, 'pembeli' => 'Grace Red', 'penjualan_kode' => 'PJL009', 'penjualan_tanggal' => Carbon::now()],
            ['penjualan_id' => 10, 'user_id' => 1, 'pembeli' => 'Hank Yellow', 'penjualan_kode' => 'PJL010', 'penjualan_tanggal' => Carbon::now()],
        ];

        DB::table('t_penjualan')->insert($penjualan);

    }
}
