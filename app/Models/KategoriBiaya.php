<?php

namespace App\Models;

use App\Models\KomponenBiaya;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class KategoriBiaya extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function komponen(): HasMany
    {
        return $this->hasMany(KomponenBiaya::class);
    }

    public static function search($query = null)
    {
        return self::where('name', 'like', "%{$query}%");
        }
}
