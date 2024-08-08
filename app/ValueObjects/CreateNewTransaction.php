<?php

namespace App\ValueObjects;

use Illuminate\Contracts\Support\Arrayable;

final class CreateNewTransaction implements Arrayable
{
    private int $userId;
    private string $type;

    private string $amount;
    private string $date;

    /**
     * Create a new class instance.
     */
    public function __construct(
        int    $userId,
        string $type,
        string $amount,
        string $date
    )
    {
        $this->userId = $userId;
        $this->type = $type;
        $this->amount = $amount;
        $this->date = $date;
    }

    public function toArray(): array
    {
        return [
            'user_id' => $this->userId,
            'type' => $this->type,
            'amount' => $this->amount,
            'date' => $this->date,
        ];
    }

    /**
     * @return string
     */
    public function getAmount(): string
    {
        return $this->amount;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @return int
     */
    public function getUserId(): int
    {
        return $this->userId;
    }

    /**
     * @return string
     */
    public function getDate(): string
    {
        return $this->date;
    }
}
