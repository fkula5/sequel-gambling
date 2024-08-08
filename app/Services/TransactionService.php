<?php

namespace App\Services;

use App\Models\User;
use App\Repositories\TransactionRepository;
use App\ValueObjects\CreateNewTransaction;

class TransactionService
{
    /**
     * Create a new class instance.
     */
    public function __construct(private TransactionRepository $transactionRepository)
    {
        //
    }

    public function create(CreateNewTransaction $transaction)
    {
        //utworzyć nową tranzakcje
        $this->transactionRepository->create($transaction);
        //zaktualizować dane użytkownika
        $user = User::find($transaction->getUserId());

//
//        switch ($transaction->getType()) {
//            case 'deposit':
//
//        }
    }
}
