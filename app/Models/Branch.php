<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Branch extends Model
{
    use HasFactory,Sluggable;

    public $fillable = [
        'title',
        'slug',
        'email',
        'manager',
        'tel',
        'fax',
        'user_id',
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

    public function showroom_a() {
        return $this->hasMany(BranchOffice::class)->where('type', 'showroom');
    }

    public function parts_a() {
        return $this->hasMany(BranchOffice::class)->where('type', 'parts');
    }

    public function services_a() {
        return $this->hasMany(BranchOffice::class)->where('type', 'services');
    }

    public function showroom() {
        return $this->hasMany(BranchOffice::class)->where('status', 1)->where('type', 'showroom');
    }

    public function parts() {
        return $this->hasMany(BranchOffice::class)->where('status', 1)->where('type', 'parts');
    }

    public function services() {
        return $this->hasMany(BranchOffice::class)->where('status', 1)->where('type', 'services');
    }

}
