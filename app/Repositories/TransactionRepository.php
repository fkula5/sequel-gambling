<?php

namespace App\Repositories;

use App\Models\Transaction;
use App\ValueObjects\CreateNewTransaction;

class TransactionRepository
{
    public function create(CreateNewTransaction $transaction): void
    {
        Transaction::create([
            ...$transaction->toArray(),
        ]);
    }
}
