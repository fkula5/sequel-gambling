<?php

namespace App\Http\Controllers;

use App\Imports\UsersImport;
use App\Models\User;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;


class UserController extends Controller
{
    public function index()
    {
        $users = User::all();

//        return Inertia::render('Home', [
//            'users' => $users,
//            'canLogin' => Route::has('login'),
//            'canRegister' => Route::has('register'),
//        ]);
        return view('users', compact('users'));
    }

    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|file|mimes:csv,txt'
        ]);

        Excel::import(new UsersImport, $request->file('file'));

        return back()->with('success', 'Users imported successfully.');
    }
}
