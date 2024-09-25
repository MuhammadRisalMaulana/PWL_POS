@extends('layouts.template')
@section('content')
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">{{ $page->title }}</h3>
            <div class="card-tools"></div>
        </div>
        <div class="card-body">
            @empty($transaksi)
                <div class="alert alert-danger alert-dismissible">
                    <h5><i class="icon fas fa-ban"></i> Kesalahan!</h5>
                    Data yang Anda cari tidak ditemukan.
                </div>
                <a href="{{ url('transaksi') }}" class="btn btn-sm btn-default mt-2">Kembali</a>
            @else
                <div class="form-group row">
                    <label class="col-3 control-label col-form-label">User</label>
                    <div class="col-9">
                        <p class="form-control-plaintext">{{ $transaksi->user->nama }}</p>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-3 control-label col-form-label">Pembeli</label>
                    <div class="col-9">
                        <p class="form-control-plaintext">{{ $transaksi->pembeli }}</p>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-3 control-label col-form-label">Kode Transaksi</label>
                    <div class="col-9">
                        <p class="form-control-plaintext">{{ $transaksi->penjualan_kode }}</p>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-3 control-label col-form-label">Tanggal Transaksi</label>
                    <div class="col-9">
                        <p class="form-control-plaintext">{{ $transaksi->penjualan_tanggal }}</p>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-12">
                        <a class="btn btn-sm btn-primary" href="{{ url('transaksi/' . $transaksi->penjualan_id . '/edit') }}">Edit</a>
                        <a class="btn btn-sm btn-default ml-1" href="{{ url('transaksi') }}">Kembali</a>
                    </div>
                </div>
            @endempty
        </div>
    </div>
@endsection
@push('css')
@endpush
@push('js')
@endpush
