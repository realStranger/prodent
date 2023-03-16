<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\Relations\HasOne;

class User extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function status(): BelongsTo
    {
        return $this->BelongsTo(UserStatus::class);
    }

    public function specializations(): HasManyThrough
    {
        return $this->hasManyThrough(
            Specialization::class,
            UserSpecialization::class,
            'user_id',
            'id',
            'id',
            'specialization_id'
        );
    }
}
