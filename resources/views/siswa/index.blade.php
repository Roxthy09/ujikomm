@extends('layouts.backend')
@section('content')
@include('layouts.components-backend.css')

@if(session('failures'))
    <div class="alert alert-danger">
        <strong>Gagal Import:</strong>
        <ul>
            @foreach(session('failures') as $failure)
                <li>
                    Baris {{ $failure->row() }} :
                    {{ implode(', ', $failure->errors()) }}
                </li>
            @endforeach
        </ul>
    </div>
@endif


<div class="container-fluid">

    <!-- Header Section -->
    <div class="card bg-gradient-primary shadow-sm position-relative overflow-hidden mb-5">
        <div class="card-body px-4 py-4">
            <div class="row align-items-center">
                <div class="col-9">
                    <h3 class="fw-bold mb-3 text-white">Data Siswa</h3>
                    <p class="text-white-75 mb-3">Manajemen data siswa dan import Excel</p>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb breadcrumb-light">
                            <li class="breadcrumb-item">
                                <a class="text-white text-decoration-none" href="">
                                    <i class="ti ti-home me-1"></i>Dasbor
                                </a>
                            </li>
                            <li class="breadcrumb-item text-white active">Siswa</li>
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

    {{-- Alert --}}
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            <i class="ti ti-check me-2"></i>{{ session('success') }}
            <button class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <!-- Action Card -->
    <div class="card mb-4 shadow-sm">
        <div class="card-body">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <h5 class="mb-1">Import Data Siswa</h5>
                    <small class="text-muted">Upload file Excel (.xls / .xlsx)</small>
                </div>
                <div class="col-md-6 text-end">
                    <a href="{{ route('siswa.create') }}" class="btn btn-primary">
                        <i class="ti ti-plus me-1"></i>Tambah Siswa
                    </a>
                </div>
            </div>

            <hr>

            <form action="{{ route('siswa.import') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row g-2">
                    <div class="col-md-8">
                        <input type="file" name="file" class="form-control"
                            accept=".xlsx,.xls" required>
                    </div>
                    <div class="col-md-4">
                        <button class="btn btn-success w-100">
                            <i class="ti ti-upload me-1"></i>Import
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Table Card -->
    <div class="card shadow-sm">
        <div class="card-header bg-light">
            <h5 class="mb-0">Daftar Siswa</h5>
        </div>

        <div class="card-body table-responsive">
            <table class="table table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Kelas</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($siswas as $index => $siswa)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td class="fw-semibold">{{ $siswa->nama }}</td>
                            <td>{{ $siswa->email }}</td>
                            <td>
                                <span class="badge bg-info">{{ $siswa->kelas->nama_kelas }}</span>
                            </td>
                            <td class="text-center">
                                <a href="{{ route('siswa.edit', $siswa->id) }}"
                                    class="btn btn-sm btn-warning">
                                    <i class="ti ti-edit"></i>
                                </a>

                                <form action="{{ route('siswa.destroy', $siswa->id) }}"
                                    method="POST" class="d-inline"
                                    onsubmit="return confirm('Yakin hapus siswa ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger">
                                        <i class="ti ti-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center text-muted py-4">
                                <i class="ti ti-users fs-1 d-block mb-2"></i>
                                Belum ada data siswa
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</div>

<style>
    .bg-gradient-primary {
        background: linear-gradient(135deg, #5d87ff, #4b6fff);
    }
</style>

@endsection
