@extends('layouts.template')
@section('content')
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">{{ $page->title }}</h3>
        </div>
        <div class="card-body">
            <div class="form-group row">
                <label class="col-2 control-label col-form-label">Kode Level</label>
                <div class="col-10">
                    <p class="form-control-plaintext">{{ $level->level_kode }}</p>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-2 control-label col-form-label">Nama Level</label>
                <div class="col-10">
                    <p class="form-control-plaintext">{{ $level->level_nama }}</p>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-2 control-label col-form-label"></label>
                <div class="col-10">
                    <a class="btn btn-sm btn-default" href="{{ url('level') }}">Kembali</a>
                </div>
            </div>
        </div>
    </div>
@endsection
