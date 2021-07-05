<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Image\Manipulations;

class Slider extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    public $fillable = ['title', 'type', 'link', 'order', 'status'];

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')
              ->width(100);
        $this->addMediaConversion('medium')
              ->width(400);
    }


}
