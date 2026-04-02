<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\Kelas;
use App\Imports\SiswaImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class SiswaController extends Controller
{
    public function index()
    {
        $siswas = Siswa::all();
        return view('siswa.index', compact('siswas'));
    }

    public function create()
    {
        $kelas = Kelas::all();
        return view('siswa.create', compact('kelas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'email' => 'required|email|unique:siswas,email',
            'kelas_id' => 'required|exists:kelas,id',
        ]);

        Siswa::create($request->all());

        return redirect()->route('siswa.index')->with('success','Data berhasil disimpan');
    }

    public function edit(Siswa $siswa)
    {
        return view('siswa.edit', compact('siswa'));
    }

    public function update(Request $request, Siswa $siswa)
    {
        $request->validate([
            'nama' => 'required',
            'kelas' => 'required',
        ]);

        $siswa->update($request->all());

        return redirect()->route('siswa.index')->with('success','Data berhasil diupdate');
    }

    public function destroy(Siswa $siswa)
    {
        $siswa->delete();
        return back()->with('success','Data berhasil dihapus');
    }

    public function show(Siswa $siswa)
{
    return view('siswa.show', compact('siswa'));
}

public function import(Request $request)
{
    $request->validate([
        'file' => 'required|mimes:xls,xlsx'
    ]);

    try {
        Excel::import(new SiswaImport, $request->file('file'));
        return back()->with('success', 'Data siswa berhasil diimport');
    } catch (\Maatwebsite\Excel\Validators\ValidationException $e) {
        $failures = $e->failures();

        return back()->with('error', 'Import gagal, periksa data Excel')
                     ->with('failures', $failures);
    }
}
}
