@extends('layouts.backend')

@section('content')
<div class="container-fluid">

    <!-- Header -->
    <div class="card shadow-sm position-relative overflow-hidden mb-5"
         style="background: linear-gradient(135deg, #4e73df, #6f42c1);">
        <div class="card-body px-4 py-4">
            <div class="row align-items-center">
                <div class="col-9">
                    <h3 class="fw-bold text-white mb-2">
                        <i class="ti ti-user-edit me-2"></i>Edit Data Siswa
                    </h3>
                    <p class="text-white-75 mb-0">
                        Perbarui informasi siswa dengan benar
                    </p>
                </div>
                <div class="col-3 text-center">
                    <img src="{{ asset('assets/backend/images/breadcrumb/ChatBc.png') }}"
                         class="img-fluid"
                         style="max-height:110px; filter: drop-shadow(0 6px 10px rgba(0,0,0,.25));">
                </div>
            </div>
        </div>
    </div>

    <!-- Form Card -->
    <div class="card border-0 shadow-sm">
        <div class="card-header text-white fw-bold"
             style="background: linear-gradient(135deg, #4e73df, #6f42c1);">
            <i class="ti ti-edit me-2"></i>Form Edit Siswa
        </div>

        <div class="card-body">
            <form action="{{ route('siswa.update', $siswa->id) }}" method="POST">
                @csrf
                @method('PUT')

                <!-- Nama -->
                <div class="mb-3">
                    <label class="form-label fw-bold text-primary">
                        <i class="ti ti-user me-1"></i>Nama Siswa
                    </label>
                    <input type="text"
                           name="nama"
                           value="{{ old('nama', $siswa->nama) }}"
                           class="form-control"
                           required>
                </div>

                <!-- Kelas -->
                <div class="mb-3">
                    <label class="form-label fw-bold"
                           style="color:#6f42c1;">
                        <i class="ti ti-school me-1"></i>Email
                    </label>
                    <input type="text"
                           name="email"
                           value="{{ old('email', $siswa->email) }}"
                           class="form-control"
                           required>
                </div>

                <!-- kelas -->
                <div class="mb-4">
                    <label class="form-label fw-bold text-primary">
                        <i class="ti ti-map-pin me-1"></i>kelas
                    </label>
                    <textarea name="kelas"
                              rows="3"
                              class="form-control"
                              required>{{ old('kelas', $siswa->kelas) }}</textarea>
                </div>

                <!-- Button -->
                <button type="submit"
                        class="btn text-white px-4 shadow-sm"
                        style="background: linear-gradient(135deg, #4e73df, #6f42c1); border:none;">
                    <i class="ti ti-check me-2"></i>Update Data
                </button>

                <a href="{{ route('siswa.index') }}"
                   class="btn btn-outline-secondary ms-2 px-4"
                   style="border-color:#6f42c1; color:#6f42c1;">
                    <i class="ti ti-arrow-left me-2"></i>Kembali
                </a>
            </form>
        </div>
    </div>

</div>
@endsection
