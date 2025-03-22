<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Outcome extends Model
{

    use HasFactory;

    protected $guarded = ['id'];

    // Relasi dengan model Post
    public function sppd()
    {
        return $this->belongsTo(Post::class, 'sppd_id');
    }

    // Relasi dengan model Kategori (jika ada)
    public function kategori()
    {
        return $this->belongsTo(KategoriBiaya::class, 'kategori_id');
    }
}
