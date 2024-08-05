<?php

namespace App\Imports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class UsersImport implements ToModel, WithHeadingRow, WithValidation
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new User([
            'name' => $row['name'],
            'email' => $row['email'],
            'password' => $row['password'],
            'balance' => $row['balance'],
            'deposit' => $row['deposit'],
            'withdraw' => $row['withdraw'],
        ]);
    }

    public function rules(): array
    {
        return [
            'name' => 'required',
            'password' => 'required|min:5',
            'email' => 'required|email|unique:users',
            'balance' => 'required',
            'deposit' => 'required',
            'withdraw' => 'required',
        ];
    }
}
