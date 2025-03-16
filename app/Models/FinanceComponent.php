<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FinanceComponent extends Model
{
    /** @use HasFactory<\Database\Factories\FinanceComponentFactory> */
    use HasFactory;
    
    protected $guarded = ['id'];
    protected $with = ['finance_category'];

    public function finance_category(): BelongsTo
    {
        return $this->belongsTo(FinanceCategory::class);
    }
}
