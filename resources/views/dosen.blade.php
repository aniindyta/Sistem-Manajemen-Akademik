@extends('mainLayout')

@section('content')

<div class="page-heading" style="margin-bottom: 20px;">
    <h3 style="margin-bottom: 15px;">Data Dosen</h3>
    @can('isAdmin')
    <div style="display: flex; justify-content: flex-end;">
    <a href="addDosen" class="btn icon icon-left btn-primary">+ Tambah Dosen</a>
    </div>
    @endcan
</div>
<!-- Basic Tables start -->
<div class="section">
    <div class="row" id="basic-table">
        <div class="col-12 col-md-12">
            <div class="card">
                <div class="card-content">
                    <div class="card-body">
                        <!-- Table with outer spacing -->
                        <div class="table-responsive">
                            <table class="table table-lg">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>FOTO</th>
                                        <th>NIP</th>
                                        <th>NAMA</th>
                                        <th>ALAMAT</th>
                                        @can('isAdmin')
                                        <th style="text-align:center">AKSI</th>
                                        @endcan
                                    </tr>
                                </thead>
                                </tr>
                                <tbody>
                                    @foreach ($dosen as $key => $row)
                                    <tr>
                                        <td class="text-bold-500">{{ $dosen->firstItem() + $key }}</td>
                                        <td class="text-bold-500">
                                            <img src="{{ asset('fotoDosen/'.$row->photo)}}" style="width:50px;" alt="">
                                        </td>
                                        <td class="text-bold-500">{{ $row->nip }}</td>
                                        <td>{{ $row->nama }}</td>
                                        <td class="text-bold-500">{{ $row->alamat }}</td>
                                        @can('isAdmin')
                                        <td>
                                            <div style="display: flex; align-items:center; gap: 5px">
                                                <a href="editDosen{{ $row -> id }}" class="btn btn-sm icon btn-primary"><i
                                                        class="bi bi-pencil"></i></a>
                                                <a href="deleteDosen{{ $row -> id }}" class="btn btn-sm icon btn-danger"><i
                                                        class="bi bi-x"></i></a>
                                            </div>
                                        </td>
                                        @endcan
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="mb-2">
        Showing {{ $dosen->firstItem() }} of {{ $dosen->total() }}
    </div>
    {{ $dosen->links() }}
</div>

@endsection