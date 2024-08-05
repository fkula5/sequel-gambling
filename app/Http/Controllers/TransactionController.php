<?php

namespace App\Http\Controllers;

use App\Imports\TransactionsImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class TransactionController extends Controller
{
    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|file|mimes:csv,txt'
        ]);

        Excel::import(new TransactionsImport, $request->file('file'));

        return back()->with('success', 'File imported successfully.');
    }
}
