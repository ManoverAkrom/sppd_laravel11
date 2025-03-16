<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FinanceCategory extends Model
{
    /** @use HasFactory<\Database\Factories\FinanceCategoryFactory> */
    use HasFactory;
    protected $guarded = ['id'];

    public function finance_component(): HasMany
    {
        return $this->hasMany(FinanceComponent::class);
    }
}
