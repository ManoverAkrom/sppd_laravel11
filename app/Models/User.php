<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    // protected $fillable = [
    //     'name',
    //     'email',
    //     'password',
    // ];

    protected $guarded = ['id'];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function posts(): HasMany
    {
        return $this->hasMany(Post::class, ['author_id', 'name_id', 'follower_id']);
    }
    public function categories(): HasMany
    {
        return $this->hasMany(Category::class, 'author_id');
    }

    public function pemberitahuan(): HasMany
    {
        return $this->hasMany(Pemberitahuan::class, 'user_id');
    }

    public function scopeFilter(Builder $query, array $filters): void
    {
        $query->when(
            $filters['search'] ?? false,
            fn($query, $search) =>
            $query->where('name', 'like', '%' . $search . '%')
                ->orWhere('username', 'like', '%' . $search . '%')
                ->orWhere('email', 'like', '%' . $search . '%')
                ->orWhere('role', 'like', '%' . $search . '%')
        );
        
    }

    public function getRouteKeyName()
    {
        return 'username';
    }

    public static function user_role(): array
    {
        return [ 
            'user', 
            'admin', 
            'master', 
            'treasurer', 
        ];
    }

    public static function rank(): array
    {
        return [ 
            '-',
            'Juru Muda (I/a)', 
            'Juru Muda Tingkat I (I/b)', 
            'Juru (I/c)', 
            'Juru Tingkat I (I/d)', 
            'Pengatur Muda (II/a)', 
            'Pengatur Muda Tingkat I (II/b)', 
            'Pengatur (II/c)', 
            'Pengatur Tingkat I (II/d)', 
            'Penata Muda (III/a)', 
            'Penata Muda Tingkat I (III/b)', 
            'Penata (III/c)', 
            'Penata Tingkat I (III/d)', 
            'Pembina (IV/a)', 
            'Pembina Tingkat I (IV/b)', 
            'Pembina Utama Muda (IV/c)', 
            'Pembina Utama Madya (IV/d)', 
            'Pembina Utama (IV/e)', 
        ];
    }
}
