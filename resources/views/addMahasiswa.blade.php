@extends('mainLayout')

@section('content')

<div class="page-heading">
    <h3>Tambah Data Mahasiswa</h3>
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
                        <form method="POST" class="form" action="{{ route('saveMahasiswa') }}">
                            @csrf
                            <div class="row">
                            <div class="col-md-12 col-12">
                                    <div class="form-group mandatory">
                                        <fieldset>
                                            <label class="form-label">
                                                Kelas
                                            </label>
                                            <div>
                                                <div class="form-check-inline">
                                                    <input class="form-check-input" type="radio" name="kelas"
                                                        id="kelas" data-parsley-required="true" value="A">
                                                    <label class="form-check-label form-label" for="kelas1">
                                                        A
                                                    </label>
                                                </div>
                                                <div class="form-check-inline">
                                                    <input class="form-check-input" type="radio" name="kelas"
                                                        id="kelas" value="B">
                                                    <label class="form-check-label form-label" for="kelas2">
                                                        B
                                                    </label>
                                                </div>
                                                <div class="form-check-inline">
                                                    <input class="form-check-input" type="radio" name="kelas"
                                                        id="kelas" value="C">
                                                    <label class="form-check-label form-label" for="kelas3">
                                                        C
                                                    </label>
                                                </div>
                                            </div>


                                        </fieldset>
                                    </div>
                                </div>
                                <div class="col-md-12 col-12">
                                    <div class="form-group mandatory">
                                        <label for="first-name-column" class="form-label">NIM</label>
                                        <input type="text" id="nim" class="form-control" placeholder="NIM" name="nim">
                                    </div>
                                </div>
                                <div class="col-md-12 col-12">
                                    <div class="form-group mandatory">
                                        <label for="first-name-column" class="form-label">Nama Lengkap</label>
                                        <input type="text" id="nama" class="form-control" placeholder="Nama"
                                            name="nama">
                                    </div>
                                </div>
                                <div class="col-md-12 col-12">
                                    <div class="form-group mandatory">
                                        <label for="first-name-column" class="form-label">Alamat</label>
                                        <input type="text" id="alamat" class="form-control" placeholder="Alamat"
                                            name="alamat">
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