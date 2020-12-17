<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    use HasFactory;

    public $fillable = [
        'title',
        'first_name',
        'last_name',
        'type',
        'age',
        'tel',
        'mobile',
        'email',
        'vin',
        'hear',
        'emirate',
        'user_id',
        'purchase_type',
        'showroom',
        'location',
        'model',
        'year',
        'service_type',
        'service_date',
        'branch_id',
        'status',
        'order',
    ];

}
