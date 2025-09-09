<?php

namespace App\Models;

use App\Models\News;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    protected $fillable = [
        'news_id'
    ];

    // relasi
    public function news(){
        return $this->belongsTo(News::class);
    }
}
