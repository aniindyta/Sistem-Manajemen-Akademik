@extends('mainLayout')

@section('content')

<div class="page-heading" style="margin-bottom: 20px;">
    <h3 style="margin-bottom: 15px;">Data Mahasiswa</h3>
    @can('isAdmin')
    <div style="display: flex; justify-content: flex-end;">
        <a href="addMahasiswa" class="btn icon icon-left btn-primary">+ Tambah Mahasiswa</a>
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
                                        <th>KELAS</th>
                                        <th>NIM</th>
                                        <th>NAMA</th>
                                        <th>ALAMAT</th>
                                        <th style="text-align:center">AKSI</th>
                                    </tr>
                                </thead>
                                </tr>
                                <tbody>
                                    @foreach ($mahasiswa as $key => $row)
                                    <tr>
                                        <td class="text-bold-500">{{ $mahasiswa->firstItem() + $key }}</td>
                                        <td class="text-bold-500">{{ $row->kelas }}</td>
                                        <td class="text-bold-500">{{ $row->nim }}</td>
                                        <td>{{ $row->nama }}</td>
                                        <td class="text-bold-500">{{ $row->alamat }}</td>
                                        <td>
                                            <div style="display: flex; align-items:center; gap: 5px">
                                                <a href="editMahasiswa{{ $row -> id }}" class="btn btn-sm icon btn-primary"><i
                                                        class="bi bi-pencil"></i></a>
                                                <a href="deleteMahasiswa{{ $row -> id }}" class="btn btn-sm icon btn-danger"><i
                                                        class="bi bi-x"></i></a>
                                            </div>
                                        </td>
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
        Showing {{ $mahasiswa->firstItem() }} of {{ $mahasiswa->total() }}
    </div>
    {{ $mahasiswa->links() }}
</div>

@endsection