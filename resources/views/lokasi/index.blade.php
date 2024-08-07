@extends('adminlte::page')

@section('title', 'Data Lokasi')
@section('plugins.Datatables', true)

@section('content_header')
    <h1 class="m-0 text-dark">Data Lokasi</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">

                <div class="card-header">
                    <h2 class="card-title"><strong>Table Data Lokasi</strong></h2>
                    <div class="form-group float-right">
                        <a href="{{ route('lokasi.create') }}" class="btn btn-primary btn-md" target="_blank"> Tambah
                            Lokasi</a>
                        <a href="{{ route('print.lokasi') }}" class="btn btn-success btn-md" target="_blank"> Print
                            Lokasi</a>
                    </div>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped" id="lokasi">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nama Lokasi</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
@stop

@push('js')
    <script type="text/javascript">
        $(document).ready(function() {
            var dataTable = $('#lokasi').DataTable({
                processing: true,
                serverSide: true,
                autoWidth: false,
                stateSave: true,
                "order": [
                    [0, "desc"]
                ],
                ajax: '{{ route('get.lokasi') }}',
                columns: [{
                        data: 'id',
                        name: 'id'
                    },
                    {
                        data: 'nama_lokasi',
                        name: 'nama_lokasi'
                    },
                    {
                        data: 'aksi',
                        name: 'aksi',
                        orderable: false,
                        searchable: false,
                        'sClass': 'text-center'
                    }
                ]
            });
        });
    </script>
@endpush
