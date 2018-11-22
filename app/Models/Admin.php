<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\Models\Media;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\HasMedia\Interfaces\HasMedia;

class Admin extends Authenticatable implements HasMedia
{
    use HasMediaTrait;

    const DEFAULT_AVATAR_PATH  = 'assets/images/default_avatar.png';

    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public static function boot()
    {
        parent::boot();

        self::created(function($model) {
            $model->addMedia(resource_path(self::DEFAULT_AVATAR_PATH))
                     ->preservingOriginal()
                     ->toMediaCollection('avatar');
        });
    }

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = $value ? bcrypt($value) : $this->password;
    }

    public function registerMediaConversions(Media $media = null)
    {
        $this->addMediaConversion('frontend')
            ->setManipulations((new Manipulations())->fit(Manipulations::FIT_CROP, 160, 160))
            ->performOnCollections('avatar')
            ->keepOriginalImageFormat()
            ->nonQueued();
    }

    public function getAvatarAttribute()
    {
        return $this->getFirstMedia('avatar') ?? false;
    }
}