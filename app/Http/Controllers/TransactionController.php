<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTransactionRequest;
use App\Imports\TransactionsImport;
use App\Models\Transaction;
use App\Services\TransactionService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use Inertia\Response;
use Maatwebsite\Excel\Facades\Excel;

class TransactionController extends Controller
{
    public function __construct(private TransactionService $transactionService)
    {
    }

    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|file|mimes:csv,txt'
        ]);

        Excel::import(new TransactionsImport, $request->file('file'));

        return back()->with('success', 'File imported successfully.');
    }

    public function store(CreateTransactionRequest $request): RedirectResponse
    {
        $this->transactionService->create($request->getTransaction());

        return Redirect::route('dashboard')->with('success', 'Transaction created successfully.');
    }

    public function create(): Response
    {
        return Inertia::render('Transaction/Create');
    }

    public function destroy(Transaction $transaction)
    {
        $this->transactionService->delete($transaction);

        return redirect()->route('dashboard')->with('success', 'Transaction deleted successfully.');
    }
}
