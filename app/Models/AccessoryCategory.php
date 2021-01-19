<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class AccessoryCategory extends Model
{
    use HasFactory, Sluggable;

    public $fillable = [
        'title',
        'slug',
        'type',
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

    public function accessories() {
        return $this->hasMany(Accessory::class);
    }

}
