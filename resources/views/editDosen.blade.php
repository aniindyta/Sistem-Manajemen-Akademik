@extends('mainLayout')

@section('content')

<div class="page-heading">
    <h3>Tambah Data Dosen</h3>
</div>

<section id="multiple-column-form">
    <div class="row match-height">
        <div class="col-12">
            <div class="card">
                <div class="card-content">
                    <div class="card-body">
                        @if ($errors->any())
                        <h1 class="auth-title" style="font-size: large;color: red;margin-bottom: 25px;">
                            @foreach ($errors->all() as $error)
                            {{ $error }}<br>
                            @endforeach
                        </h1>
                        @endif
                        <form method="POST" class="form" action="updateDosen{{$dosen->id}}" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-12 col-12">
                                    <div class="form-group mandatory">
                                        <label for="first-name-column" class="form-label">NIP</label>
                                        <input type="text" id="nip" class="form-control" placeholder="NIP" name="nip" value="{{ $dosen -> nip }}">
                                    </div>
                                </div>
                                <div class="col-md-12 col-12">
                                    <div class="form-group mandatory">
                                        <label for="first-name-column" class="form-label">Nama Lengkap</label>
                                        <input type="text" id="nama" class="form-control" placeholder="Nama" value="{{ $dosen -> nama}}"
                                            name="nama">
                                    </div>
                                </div>
                                <div class="col-md-12 col-12">
                                    <div class="form-group mandatory">
                                        <label for="first-name-column" class="form-label">Alamat</label>
                                        <input type="text" id="alamat" class="form-control" placeholder="Alamat" value="{{ $dosen -> alamat}}"
                                            name="alamat">
                                    </div>
                                </div>
                                <div class="col-md-12 col-12">
                                    <div class="mb-3">
                                        <label for="formFile" class="form-label">Photo</label>
                                        <input class="form-control" type="file" id="photo" name="photo">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 d-flex justify-content-end"
                                    style="padding-bottom: 10px;padding-top: 20px;">
                                    <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- // Basic multiple Column Form section end -->

@endsection