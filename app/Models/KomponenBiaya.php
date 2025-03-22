<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class KomponenBiaya extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $with = ['kategori'];

    public function kategori(): BelongsTo
    {
        return $this->belongsTo(KategoriBiaya::class);
    }
}
