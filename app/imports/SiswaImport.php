<?php

namespace App\Imports;

use App\Models\Siswa;
use App\Models\Kelas;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class SiswaImport implements ToModel, WithHeadingRow, WithValidation
{
    public function model(array $row)
    {
        $kelas = Kelas::whereRaw(
            'LOWER(nama_kelas) = ?',
            [strtolower(trim($row['kelas']))]
        )->first();

        return new Siswa([
            'nama'     => $row['nama'],
            'email'    => $row['email'],
            'kelas_id' => $kelas->id,
        ]);
    }

    /**
     * VALIDASI EXCEL
     */
    public function rules(): array
    {
        return [
            '*.nama' => ['required'],
            '*.email' => [
                'required',
                'email',
                Rule::unique('siswas', 'email'),
            ],
            '*.kelas' => [
                'required',
                function ($attribute, $value, $fail) {
                    if (!Kelas::whereRaw('LOWER(nama_kelas) = ?', [strtolower(trim($value))])->exists()) {
                        $fail("Kelas '{$value}' tidak terdaftar");
                    }
                },
            ],
        ];
    }

    /**
     * PESAN ERROR CUSTOM (BIAR MANUSIAWI)
     */
    public function customValidationMessages()
    {
        return [
            '*.nama.required' => 'Nama siswa wajib diisi',
            '*.email.required' => 'Email wajib diisi',
            '*.email.email' => 'Format email tidak valid',
            '*.email.unique' => 'Email sudah terdaftar',
            '*.kelas.required' => 'Kelas wajib diisi',
        ];
    }
}