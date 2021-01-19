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

class PageManager extends Model implements HasMedia
{
    use HasFactory, Sluggable, InteractsWithMedia;

    public $fillable = [
        'title',
        'body',
        'status',
        'order',
    ];

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('mini')
              ->width(100);
        $this->addMediaConversion('small')
              ->width(400);
    }

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

}
