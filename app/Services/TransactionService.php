<?php

namespace App\Services;

use App\Models\Transaction;
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

    public function create(CreateNewTransaction $transaction): void
    {
        $this->transactionRepository->create($transaction);
        $user = User::find($transaction->getUserId());

        switch ($transaction->getType()) {
            case 'withdrawal':
                $user->withdraw += $transaction->getAmount();
                $user->balance -= $transaction->getAmount();
                break;
            case 'deposit':
                $user->deposit += $transaction->getAmount();
                $user->balance += $transaction->getAmount();
                break;
        }
        $user->save();
    }

    public function delete(Transaction $transaction): void
    {
        $user = User::find($transaction->user_id);

        switch ($transaction->type->value) {
            case 'withdrawal':
                $user->withdraw -= $transaction->amount;
                $user->balance += $transaction->amount;
                break;
            case 'deposit':
                $user->deposit -= $transaction->amount;
                $user->balance -= $transaction->amount;
                break;
        }

        $user->save();

        $transaction->delete();
    }

}
