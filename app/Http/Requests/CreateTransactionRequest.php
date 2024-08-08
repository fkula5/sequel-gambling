<?php

namespace App\Http\Requests;

use App\ValueObjects\CreateNewTransaction;
use Illuminate\Foundation\Http\FormRequest;

class CreateTransactionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'amount' => 'required|numeric|min:1',
            'type' => 'required|in:withdrawal,deposit',
        ];
    }

    public function getTransaction(): CreateNewTransaction
    {
        return new CreateNewTransaction(
            $this->user()->id,
            $this->get('type'),
            $this->get('amount'),
            now(),
        );
    }
}
