<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TravelCategory extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function travel_component(): HasMany
    {
        return $this->hasMany(TravelComponent::class);
    }
}
