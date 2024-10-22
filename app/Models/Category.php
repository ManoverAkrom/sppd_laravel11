<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Category extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $with = ['author'];

    public function posts(): HasMany
    {
        return $this->hasMany(Post::class);
    }
    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function scopeFilter(Builder $query, array $filters): void
    {
        $query->when(
            $filters['search'] ?? false,
            fn($query, $search) =>
            $query->where('name', 'like', '%' . $search . '%')
                ->orWhere('class', 'like', '%' . $search . '%')
                ->orWhere('code', 'like', '%' . $search . '%')
        );
        
    }

    public function getRouteKeyName()
    {
        return 'code';
    }

    public static function name_class(): array
    {
        return [ 
            '',
            'UMUM', 
            'PEMERINTAHAN', 
            'POLITIK', 
            'KEAMANAN', 
            'KESEJAHTERAAN', 
            'PEREKONOMIAN', 
            'PEKERJAAN UMUM', 
            'PENGAWASAN',
            'KEPEGAWAIAN',
            'KEUANGAN',
        ];
    }
    public static function color(): array
    {
        return [ 
            'blue', 
            'red', 
            'green', 
            'yellow', 
            'lime', 
            'purple', 
            'pink', 
            'teal',
            'orange',
            'emerald',
            'rose',
        ];
    }
}
