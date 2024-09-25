<?php

namespace App\Http\Controllers;

use App\Models\BarangModel;
use App\Models\StokModel;
use App\Models\TransaksiModel;
use App\Models\UserModel;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class TransaksiController extends Controller
{
    public function index()
    {
        $breadcrumb = (object) [
            'title' => 'Daftar Transaksi',
            'list'  => ['Home', 'Transaksi']
        ];

        $page = (object) [
            'title' => 'Daftar transaksi yang tercatat dalam sistem'
        ];

        $activeMenu = 'transaksi'; // set menu yang sedang aktif

        $users = UserModel::all(); // Mengambil semua data user

        return view('transaksi.index', ['breadcrumb' => $breadcrumb, 'page' => $page, 'users' => $users, 'activeMenu' => $activeMenu]);
    }

    // Ambil data transaksi dalam bentuk JSON untuk DataTables
    public function list(Request $request)
    {
        $transaksi = TransaksiModel::select('penjualan_id', 'user_id', 'pembeli', 'penjualan_kode', 'penjualan_tanggal')
                    ->with('user');

        // Filter data transaksi berdasarkan user_id
        if ($request->penjualan_id) {
            $transaksi->where('penjualan_id', $request->penjualan_id);
        }

        return DataTables::of($transaksi)
            ->addIndexColumn() // menambahkan kolom index / no urut (default nama kolom: DT_RowIndex)
            ->addColumn('aksi', function ($transaksi) {  // menambahkan kolom aksi
                $btn  = '<a href="'.url('/transaksi/' . $transaksi->penjualan_id).'" class="btn btn-info btn-sm">Detail</a> ';
                $btn .= '<a href="'.url('/transaksi/' . $transaksi->penjualan_id . '/edit').'" class="btn btn-warning btn-sm">Edit</a> ';
                $btn .= '<form class="d-inline-block" method="POST" action="'. url('/transaksi/'.$transaksi->penjualan_id).'">'
                        . csrf_field() . method_field('DELETE') .
                        '<button type="submit" class="btn btn-danger btn-sm" onclick="return confirm(\'Apakah Anda yakin menghapus data ini?\');">Hapus</button></form>';
                return $btn;
            })
            ->rawColumns(['aksi']) // memberitahu bahwa kolom aksi adalah HTML
            ->make(true);
    }

    public function create()
    {
        $breadcrumb = (object) [
            'title' => 'Tambah Transaksi',
            'list'  => ['Home', 'Transaksi', 'Tambah']
        ];

        $page = (object) [
            'title' => 'Tambah transaksi baru'
        ];

        $users = UserModel::all(); // Ambil semua data user
        $activeMenu = 'transaksi'; // Set menu yang sedang aktif

        return view('transaksi.create', ['breadcrumb' => $breadcrumb, 'page' => $page, 'users' => $users, 'activeMenu' => $activeMenu]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|integer|exists:m_user,user_id',
            'pembeli' => 'required|string|max:50',
            'penjualan_kode' => 'required|string|max:20|unique:t_penjualan,penjualan_kode',
            'penjualan_tanggal' => 'required|date',
        ]);

        TransaksiModel::create([
            'user_id' => $request->user_id,
            'pembeli' => $request->pembeli,
            'penjualan_kode' => $request->penjualan_kode,
            'penjualan_tanggal' => $request->penjualan_tanggal
        ]);

        return redirect('/transaksi')->with('success', 'Data transaksi berhasil disimpan');
    }

    public function show(string $id)
    {
        $transaksi = TransaksiModel::with('user')->find($id);

        $breadcrumb = (object) [
            'title' => 'Detail Transaksi',
            'list'  => ['Home', 'Transaksi', 'Detail']
        ];

        $page = (object) [
            'title' => 'Detail transaksi'
        ];

        $activeMenu = 'transaksi'; // set menu yang sedang aktif

        return view('transaksi.show', ['breadcrumb' => $breadcrumb, 'page' => $page, 'transaksi' => $transaksi, 'activeMenu' => $activeMenu]);
    }

    public function edit(string $id)
    {
        $transaksi = TransaksiModel::find($id);
        $users = UserModel::all();

        $breadcrumb = (object) [
            'title' => 'Edit Transaksi',
            'list' => ['Home', 'Transaksi', 'Edit']
        ];

        $page = (object) [
            'title' => 'Edit Transaksi'
        ];

        $activeMenu = 'transaksi';

        return view('transaksi.edit', ['breadcrumb' => $breadcrumb, 'page' => $page, 'transaksi' => $transaksi, 'users' => $users, 'activeMenu' => $activeMenu]);
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'user_id' => 'required|integer|exists:m_user,user_id',
            'pembeli' => 'required|string|max:50',
            'penjualan_kode' => 'required|string|max:20|unique:t_penjualan,penjualan_kode,'.$id.',penjualan_id',
            'penjualan_tanggal' => 'required|date',
        ]);

        TransaksiModel::find($id)->update([
            'user_id' => $request->user_id,
            'pembeli' => $request->pembeli,
            'penjualan_kode' => $request->penjualan_kode,
            'penjualan_tanggal' => $request->penjualan_tanggal
        ]);

        return redirect('/transaksi')->with('success', 'Data transaksi berhasil diubah');
    }

    public function destroy(string $id)
    {
        $check = TransaksiModel::find($id);
        if (!$check) {
            return redirect('/transaksi')->with('success', 'Data transaksi berhasil dihapus');
        }

        try {
            TransaksiModel::destroy($id);

            return redirect('/transaksi')->with('success', 'Data transaksi berhasil dihapus');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect('/transaksi')->with('error', 'Data transaksi gagal dihapus karena masih terdapat tabel lain yang terkait dengan data ini');
        }
    }
}