<?php

namespace App\Enums;

enum TransactionType: string
{
    case WITHDRAWAL = 'withdrawal';
    case DEPOSIT = 'deposit';

    public static function fromString(string $value): self
    {
        return match ($value) {
            'withdrawal' => self::WITHDRAWAL,
            'deposit' => self::DEPOSIT,
        };
    }
}
