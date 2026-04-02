<?php

namespace App\Imports;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;

class UsersImport implements ToModel
{
    /**
     * Map setiap row Excel ke model User
     * $row = [name, email, kelas_id, password, isAdmin]
     */
    public function model(array $row)
    {
        return new User([
            'name'     => $row[0],
            'email'    => $row[1],
            'password' => Hash::make('user123'), // hash password
            'isAdmin'  => $row[3] ?? 0,        // default 0 jika kosong
        ]);
    }
}
