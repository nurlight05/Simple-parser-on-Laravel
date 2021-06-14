<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\News;

class Image extends Model
{
    use HasFactory;

    protected $fillable = [
        'news_id',
        'url',
    ];

    public function news() {
        return $this->belongsTo(News::class);
    }
}
