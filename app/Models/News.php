<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Image;

class News extends Model
{
    use HasFactory;

    protected $fillable = [
        'guid',
        'title',
        'link',
        'description',
        'pubdate',
        'author',
    ];

    public function images() {
        return $this->hasMany(Image::class);
    }
}
