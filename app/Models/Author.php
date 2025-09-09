<?php

namespace App\Models;

use App\Models\News;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    protected $fillable = [
        'name',
        'ussername',
        'avatar',
        'bio'
    ];

// relasi
    public function news() {
        return $this->hasMany(News::class);
    }
}
