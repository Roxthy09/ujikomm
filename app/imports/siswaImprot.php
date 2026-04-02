<?php

namespace App\Imports;

use App\Models\Siswa;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Facades\Excel;


class SiswaImprot implements ToModel
{
    public function model(array $row)
    {
        return new Siswa([
            'nama'   => $row[0], // kolom A
            'email'  => $row[1], // kolom B
            'alamat' => $row[2], // kolom C
        ]);
    }
}
