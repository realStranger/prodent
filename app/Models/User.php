<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\Relations\HasOne;

class User extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [];

    public function status(): HasOne
    {
        return $this->hasOne(UserStatus::class);
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
