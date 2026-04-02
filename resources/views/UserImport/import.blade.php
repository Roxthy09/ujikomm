@extends('layouts.backend')

@section('content')
<div class="container-fluid">

    <!-- Header Section -->
    <div class="card shadow-sm position-relative overflow-hidden mb-5"
         style="background: linear-gradient(135deg, #4e73df, #6f42c1);">
        <div class="card-body px-4 py-4">
            <div class="row align-items-center">
                <div class="col-9">
                    <h3 class="fw-bold mb-2 text-white">
                        <i class="ti ti-users me-2"></i>Import Users dari Excel
                    </h3>
                    <p class="text-white-75 mb-3">
                        Upload file Excel atau CSV untuk menambahkan user baru.
                    </p>

                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item">
                                <a class="text-white-75 text-decoration-none" href="{{ route('users.index') }}">
                                    <i class="ti ti-home me-1"></i>Kelola
                                </a>
                            </li>
                            <li class="breadcrumb-item active text-white">
                                Import Users
                            </li>
                        </ol>
                    </nav>
                </div>

                <div class="col-3 text-center">
                    <img src="{{ asset('assets/backend/images/breadcrumb/ChatBc.png') }}"
                         class="img-fluid"
                         style="max-height:120px; filter: drop-shadow(0 8px 12px rgba(0,0,0,.25));">
                </div>
            </div>
        </div>

        <!-- Decorative Circles -->
        <div class="position-absolute top-0 end-0 opacity-25">
            <div class="bg-white rounded-circle"
                 style="width:220px;height:220px;transform:translate(70px,-70px);"></div>
        </div>
        <div class="position-absolute bottom-0 start-0 opacity-25">
            <div class="bg-white rounded-circle"
                 style="width:160px;height:160px;transform:translate(-80px,80px);"></div>
        </div>
    </div>

    <!-- Card Form Import -->
    <div class="card border-0 shadow-sm">
        <div class="card-header fw-bold text-white"
             style="background: linear-gradient(135deg, #4e73df, #6f42c1);">
            <i class="ti ti-upload me-2"></i>Form Import Data
        </div>

        <div class="card-body">

            @if(session('success'))
                <div class="alert alert-primary border-start border-4"
                     style="border-color:#6f42c1;">
                    <i class="ti ti-check me-2"></i>{{ session('success') }}
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger border-start border-4">
                    <i class="ti ti-alert-circle me-2"></i>{{ session('error') }}
                </div>
            @endif

            <form action="{{ route('UserImport.import') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-4">
                    <label class="form-label fw-bold"
                           style="color:#6f42c1;">
                        <i class="ti ti-file-spreadsheet me-1"></i>Pilih File Excel / CSV
                    </label>

                    <input type="file"
                           name="file"
                           class="form-control form-control-lg"
                           style="border:2px dashed #6f42c1;"
                           required>

                    @error('file')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <button type="submit"
                        class="btn text-white px-4 shadow-sm"
                        style="background: linear-gradient(135deg, #4e73df, #6f42c1); border:none;">
                    <i class="ti ti-upload me-2"></i>Import Users
                </button>

                <a href="{{ route('users.index') }}"
                   class="btn btn-outline-secondary ms-2 px-4"
                   style="border-color:#6f42c1; color:#6f42c1;">
                    <i class="ti ti-arrow-left me-2"></i>Kembali
                </a>
            </form>
        </div>
    </div>
</div>
@endsection
