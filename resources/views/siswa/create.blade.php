@extends('layouts.backend')
@section('content')
@include('layouts.components-backend.css')

<div class="container-fluid">

    <!-- Header Section -->
    <div class="card bg-gradient-primary shadow-sm position-relative overflow-hidden mb-5">
        <div class="card-body px-4 py-4">
            <div class="row align-items-center">
                <div class="col-9">
                    <h3 class="fw-bold mb-2 text-white">Tambah Siswa</h3>
                    <p class="text-white-75 mb-3">Form input data siswa baru</p>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb breadcrumb-light">
                            <li class="breadcrumb-item">
                                <a class="text-white text-decoration-none" href="">
                                    <i class="ti ti-home me-1"></i>Dasbor
                                </a>
                            </li>
                            <li class="breadcrumb-item">
                                <a class="text-white text-decoration-none"
                                    href="{{ route('siswa.index') }}">Siswa</a>
                            </li>
                            <li class="breadcrumb-item text-white active">Tambah</li>
                        </ol>
                    </nav>
                </div>
                <div class="col-3 text-center">
                    <img src="{{ asset('assets/backend/images/breadcrumb/ChatBc.png') }}"
                        class="img-fluid" style="max-height:120px;">
                </div>
            </div>
        </div>
    </div>

    <!-- Form Card -->
    <div class="card shadow-sm">
        <div class="card-header bg-light">
            <h5 class="mb-0">Form Tambah Siswa</h5>
        </div>

        <div class="card-body">

            {{-- Error Validation --}}
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('siswa.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Nama Siswa</label>
                    <input type="text" name="nama"
                        class="form-control"
                        value="{{ old('nama') }}"
                        placeholder="Masukkan nama siswa" required>
                </div>

                <div class="mb-3">
    <label class="form-label">Email</label>
    <input type="email"
        name="email"
        class="form-control"
        value="{{ old('email') }}"
        placeholder="contoh@gmail.com"
        required>
</div>


                <div class="mb-3">
                    <label class="form-label">Kelas</label>
                  <select name="kelas_id" id="" class="form-control" required>
                    <option value="">Pilih Kelas</option>
                    @foreach($kelas as $k)
                    <option value="{{ $k->id}}">{{ $k->nama_kelas}}</option>
                    @endforeach
                  </select>
                </div>


                <div class="d-flex justify-content-between">
                    <a href="{{ route('siswa.index') }}" class="btn btn-secondary">
                        <i class="ti ti-arrow-left me-1"></i>Kembali
                    </a>

                    <button class="btn btn-primary">
                        <i class="ti ti-device-floppy me-1"></i>Simpan
                    </button>
                </div>
            </form>

        </div>
    </div>

</div>

<style>
    .bg-gradient-primary {
        background: linear-gradient(135deg, #5d87ff, #4b6fff);
    }
</style>

@endsection
