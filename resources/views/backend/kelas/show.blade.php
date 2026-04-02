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
                        <i class="ti ti-school me-2"></i>Detail Kelas
                    </h3>
                    <p class="text-white-75 mb-0">
                        {{ $kelas->nama_kelas }} – Daftar siswa yang terdaftar
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

    <!-- Card Table -->
    <div class="card border-0 shadow-sm">
        <div class="card-header fw-bold text-white"
             style="background: linear-gradient(135deg, #4e73df, #6f42c1);">
            <i class="ti ti-users me-2"></i>Daftar Siswa
        </div>

        <div class="card-body">

            @if ($siswa->count() > 0)
                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead class="table-light">
                            <tr>
                                <th width="60">No</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Kelas</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($siswa as $index => $s)
                                <tr>
                                    <td>
                                        <span class="badge rounded-circle bg-primary-subtle text-primary">
                                            {{ $index + 1 }}
                                        </span>
                                    </td>
                                    <td>
                                        <i class="ti ti-user me-1 text-primary"></i>
                                        {{ $s->nama }}
                                    </td>
                                    <td>
                                        <i class="ti ti-mail me-1 text-muted"></i>
                                        {{ $s->email }}
                                    </td>
                                    <td>
                                        <span class="badge"
                                              style="background:#6f42c1;">
                                            {{ $s->kelas->nama_kelas }}
                                        </span>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <div class="text-center py-5">
                    <i class="ti ti-users text-muted mb-3" style="font-size:48px;"></i>
                    <p class="text-muted mb-0">
                        Belum ada siswa di kelas ini.
                    </p>
                </div>
            @endif

        </div>
    </div>

    <!-- Button -->
    <a href="{{ route('kelas.index') }}"
       class="btn btn-outline-secondary mt-4 px-4"
       style="border-color:#6f42c1; color:#6f42c1;">
        <i class="ti ti-arrow-left me-2"></i>Kembali
    </a>

</div>
@endsection
