@extends('layouts.template')
@section('content')
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">{{ $page->title }}</h3>
        </div>
        <div class="card-body">
            <div class="form-group">
                <label for="barang_id">Barang</label>
                <input type="text" class="form-control" value="{{ $stok->barang->barang_nama }}" readonly>
            </div>
            <div class="form-group">
                <label for="user_id">User</label>
                <input type="text" class="form-control" value="{{ $stok->user->nama }}" readonly>
            </div>
            <div class="form-group">
                <label for="stok_tanggal">Tanggal</label>
                <input type="text" class="form-control" value="{{ $stok->stok_tanggal->format('d-m-Y H:i:s') }}" readonly>
            </div>
            <div class="form-group">
                <label for="stok_jumlah">Jumlah</label>
                <input type="text" class="form-control" value="{{ $stok->stok_jumlah }}" readonly>
            </div>
            <a href="{{ url('/stok') }}" class="btn btn-secondary">Kembali</a>
        </div>
    </div>
@endsection
