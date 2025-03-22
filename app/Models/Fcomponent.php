<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fcomponent extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    // protected $fillable = [
    //     'name',
    //     'slug',
    //     'amount',
    // ];
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
