<?php

namespace App\DTO;

use Illuminate\Support\Facades\Log;

final class UserWithSpecializationDTO
{
    private string|null $name;
    private int|null $status_id;
    private array $specialization;

    public function __construct(array $data)
    {
        $this->name = $data['name'] ?? null;
        $this->status_id = $data['status_id'] ?? null;
        $this->specialization = $data['specialization'] ?? [];
    }

    /**
     * @return string|null
     */
    public function getName(): string|null
    {
        return $this->name;
    }

    /**
     * @return int|null
     */
    public function getStatusId(): int|null
    {
        return $this->status_id;
    }

    /**
     * @return array
     */
    public function getSpecializations(): array
    {
        return $this->specialization;
    }
}
