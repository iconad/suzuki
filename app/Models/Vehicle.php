<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Image\Manipulations;
use Image;

class Vehicle extends Model implements HasMedia
{
    use HasFactory, Sluggable, InteractsWithMedia;

    public $fillable = [
        'title',
        'slug',
        'sub_title',
        'iframe',
        'body',
        'html_content',
        'price',
        'status',
        'order',
    ];

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('mini')
              ->width(100);
        $this->addMediaConversion('small')
              ->width(400);
    }

    public function accessories() {
        return $this->hasMany(Accessory::class)->where('status', 1);
    }

    public function files() {
        return $this->hasMany(VehicleFile::class)->where('status', 1);
    }

    public function accessory_brochure() {
        return $this->hasMany(VehicleFile::class)->where('type', 'accessory brochure')->where('status', 1)->with('media');
    }

    public function specfile() {
        return $this->hasMany(VehicleFile::class)->where('type', 'specs')->where('status', 1);
    }

    public function brochure() {
        return $this->hasMany(VehicleFile::class)->where('type', 'brochure')->where('status', 1);
    }

    public function specsheet() {
        return $this->hasMany(VehicleFile::class)->where('type', 'specs')->where('status', 1);
    }

}
