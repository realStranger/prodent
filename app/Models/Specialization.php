<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Specialization extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function users(): HasManyThrough
    {
        return $this->hasManyThrough(
            User::class,
            UserSpecialization::class,
            'specialization_id',
            'id',
            'id',
            'user_id'
        );
    }
}
