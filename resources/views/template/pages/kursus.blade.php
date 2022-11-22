@extends('template.base')

@section('content')
<div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">
                Kursus
            </h6>
            <a href="{{ route('kursus.create') }}" class="btn btn-primary btn-sm">
                + Kelas
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                @if(Session::get('Ok'))
                <div class="alert alert-success" role="alert">
                    {{ Session::get('Ok') }}
                </div>
                @endif
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th width="10%">Thumbnail</th>
                            <th>Nama Kursus</th>
                            <th>Harga</th>
                            <th>Deskripsi</th>
                            <th>Kuota</th>
                            <th>Kategori</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($kursus as $row)
                        <tr>
                            <td>
                                <img src="{{ asset('storage/'.$row->thumbnail) }}" alt="{{ $row->nama_bootcamp }}" class="img-fluid">
                            </td>
                            <td>
                                {{ $row->nama_kursus }}
                                <br>
                            </td>
                            <td>{{ $row->harga }}</td>
                            <td>{!! $row->deskripsi !!}</td>
                            <td>{{ $row->kuota }}</td>
                            <td>{{ $row->kategori->nama_kategori }}</td>
                            <td>
                                @if($row->status == 1)
                                <span class="badge badge-success">Tersedia</span>
                                @elseif($row->status == 2)
                                <span class="badge badge-danger">Penuh</span>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
     </div>

@endsection