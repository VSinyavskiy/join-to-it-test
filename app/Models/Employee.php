<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
	const DEFAULT_AVATAR_PATH  = 'storage/default_avatar.png';

    protected $fillable = [
        'first_name', 'last_name', 'email', 'phone', 'image',
    ];

    public function getImageAttribute($value)
    {
    	return $value ?? self::DEFAULT_AVATAR_PATH;
    }

    public function getImageFullUrlAttribute()
    {
    	return env('APP_URL') . $this->image;
    }
}
