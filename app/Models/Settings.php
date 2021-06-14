<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    use HasFactory;

    protected $fillable = [
        'minute',
        'hour',
        'day',
        'month',
        'weekday',
    ];

    public static function get() {
        return Settings::find(1);
    }
}
