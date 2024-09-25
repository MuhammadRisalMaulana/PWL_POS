@extends('layouts.template')
@section('content')
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">{{ $page->title }}</h3>
        </div>
        <div class="card-body">
            <form action="{{ url('/stok') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="barang_id">Barang</label>
                    <select id="barang_id" name="barang_id" class="form-control @error('barang_id') is-invalid @enderror">
                        <option value="">Pilih Barang</option>
                        @foreach ($barang as $item)
                            <option value="{{ $item->barang_id }}">{{ $item->barang_nama }}</option>
                        @endforeach
                    </select>
                    @error('barang_id')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="user_id">User</label>
                    <select id="user_id" name="user_id" class="form-control @error('user_id') is-invalid @enderror">
                        <option value="">Pilih User</option>
                        @foreach ($users as $item)
                            <option value="{{ $item->user_id }}">{{ $item->nama }}</option>
                        @endforeach
                    </select>
                    @error('user_id')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="stok_tanggal">Tanggal</label>
                    <input type="date" id="stok_tanggal" name="stok_tanggal" class="form-control @error('stok_tanggal') is-invalid @enderror" value="{{ old('stok_tanggal') }}">
                    @error('stok_tanggal')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="stok_jumlah">Jumlah</label>
                    <input type="number" id="stok_jumlah" name="stok_jumlah" class="form-control @error('stok_jumlah') is-invalid @enderror" value="{{ old('stok_jumlah') }}">
                    @error('stok_jumlah')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{ url('/stok') }}" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
@endsection
