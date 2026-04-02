<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imports\UsersImport;
use Maatwebsite\Excel\Facades\Excel;

class UserImportController extends Controller
{
    // Tampilkan form upload
    public function index()
    {
        return view('UserImport.import'); // nanti kita buat viewnya
    }

    // Proses import
    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,csv',
        ]);

        Excel::import(new UsersImport, $request->file('file'));

       return redirect()->route('users.index')
    ->with('success', 'Users berhasil diimport');
    }
}
