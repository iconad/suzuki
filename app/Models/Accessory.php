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

class Accessory extends Model implements HasMedia
{
    use HasFactory, Sluggable, InteractsWithMedia;

    public $fillable = [
        'title',
        'slug',
        'sku',
        'excerpt',
        'detail',
        'vehicle_id',
        'weight',
        'length',
        'width',
        'height',
        'color',
        'price',
        'accessory_category_id',
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

    public function category() {
        return $this->belongsTo(AccessoryCategory::class, 'accessory_category_id');
    }

    public function vehicle() {
        return $this->belongsTo(Vehicle::class);
    }

}
