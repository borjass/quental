<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Location extends Model
{
    /** @use HasFactory<\Database\Factories\LocationFactory> */
    use HasFactory;

    protected $fillable = [
        'external_id',
        'name',
        'type',
        'dimension',
    ];

    protected function casts(): array
    {
        return [
            'external_id' => 'integer',
        ];
    }

    public function residents(): HasMany
    {
        return $this->hasMany(Character::class, 'origin_location_id');
    }

    public function originCharacters(): HasMany
    {
        return $this->hasMany(Character::class, 'origin_location_id');
    }
}
