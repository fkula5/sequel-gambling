<?php

namespace App\Imports;

use App\Models\Transaction;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class TransactionsImport implements ToModel, WithHeadingRow, WithValidation
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Transaction([
            'user_id' => $row['user_id'],
            'type' => $row['type'],
            'amount' => $row['amount'],
            'date' => Carbon::createFromFormat('d.m.Y', trim($row['date']))->format('Y-m-d'),
        ]);
    }

    public function rules(): array
    {
        return [
            'user_id' => 'required',
            'type' => 'required',
            'amount' => 'required',
            'date' => 'required',
        ];
    }
}
