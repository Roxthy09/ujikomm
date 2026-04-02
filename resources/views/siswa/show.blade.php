@extends('layouts.backend')

@section('content')
<h2>Detail Siswa</h2>

<a href="{{ route('siswa.index') }}" class="btn btn-secondary mb-3">
    ← Kembali
</a>

<table class="table table-bordered">
    <tr>
        <th>Nama</th>
        <td>{{ $siswa->nama }}</td>
    </tr>
    <tr>
        <th>Kelas</th>
        <td>{{ $siswa->kelas }}</td>
    </tr>
    <tr>
        <th>Alamat</th>
        <td>{{ $siswa->alamat ?? '-' }}</td>
    </tr>
    <tr>
        <th>Dibuat</th>
        <td>{{ $siswa->created_at->format('d-m-Y H:i') }}</td>
    </tr>
</table>

<td>
    <a href="{{ route('siswa.show', $siswa->id) }}">Detail</a> |
    <a href="{{ route('siswa.edit', $siswa->id) }}">Edit</a>

    <form action="{{ route('siswa.destroy', $siswa->id) }}" method="POST" style="display:inline">
        @csrf
        @method('DELETE')
        <button type="submit">Hapus</button>
    </form>
</td>

@endsection
