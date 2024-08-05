<?php

namespace App\Enums;

enum TransactionType
{
    case WITHDRAWN;
    case DEPOSIT;

    public static function fromString(string $value): self
    {
        return match ($value){
            'withdraw' => self::WITHDRAWN,
            'deposit' => self::DEPOSIT,
        };
    }
}
