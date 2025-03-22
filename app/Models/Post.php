<?php

namespace App\Models;

use App\Models\Category;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory, Sluggable;
    // protected $fillable = ['title', 'author', 'slug', 'body'];
    protected $guarded = ['id'];

    protected $with = ['author', 'name', 'follower', 'category'];

    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    
    public function name(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function follower(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title' . 'tgl_berangkat'
            ]
        ];
    }

    // Searching Posts
    public function scopeFilter(Builder $query, array $filters): void
    {
        $query->when(
            $filters['search'] ?? false,
            fn($query, $search) =>
            $query->where('maksud', 'like', '%' . $search . '%')
                ->orWhere('tempat_tujuan', 'like', '%' . $search . '%')
        );

        $query->when(
            $filters['category'] ?? false,
            fn($query, $category) =>
            $query->whereHas('category', fn($query) => $query->where('slug', $category))
        );

        $query->when(
            $filters['author'] ?? false,
            fn($query, $author) =>
            $query->whereHas('author', fn($query) => $query->where('username', $author))
        );
    }

    public static function jalur(): array
    {
        return [ '', 'Darat', 'Udara', 'Laut', 'Darat-Udara', 'Darat-Laut', 'Udara-Laut', 'Darat-Udara-Laut' ];
    }
}
