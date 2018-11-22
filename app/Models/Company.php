<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Mail;

use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\Models\Media;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\HasMedia\Interfaces\HasMedia;

use App\Mail\CompanyCreated;

class Company extends Model implements HasMedia
{
    use HasMediaTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'website',
    ];

    public static function boot()
    {
        parent::boot();

        self::created(function($model) {
            Mail::to(env('ADMIN_DEFAULT_EMAIL', 'admin@admin.com'))
                ->send(new CompanyCreated());
        });
    }

    public function employees()
    {
        return $this->hasMany(Employee::class);
    }

    public function registerMediaConversions(Media $media = null)
    {
        $this->addMediaConversion('frontend')
            ->performOnCollections('logo')
            ->keepOriginalImageFormat()
            ->nonQueued();
    }

    public function getLogoAttribute()
    {
        return $this->getFirstMedia('logo') ?? false;
    }

    public function setLogoAttribute($logo)
    {
        return $this->addMedia($logo->getRealPath())
                    ->usingFileName($logo->getClientOriginalName() . '.' . $logo->guessClientExtension())
                    ->toMediaCollection('logo');
    }

    public static function getCompaniesList()
    {
        return self::all()->pluck('name', 'id')->toArray();
    }
}