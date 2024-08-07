@extends('adminlte::page')

@section('title', 'Edit Lokasi')

@section('content_header')
    <h1 class="m-0 text-dark">Edit Lokasi</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Edit Lokasi</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('lokasi.update', $lokasi->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="nama_lokasi">Nama Lokasi</label>
                            <input type="text" name="nama_lokasi" class="form-control" value="{{ $lokasi->nama_lokasi }}"
                                required>
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                        <a href="{{ route('lokasi.index') }}" class="btn btn-secondary">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop
