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
        'cart',
        'check_for_email',
        'user_id',
        'recall_id',
        'purchase_type',
        'showroom',
        'chassis',
        'registration',
        'location',
        'model',
        'year',
        'service_type',
        'service_date',
        'branch_id',
        'status',
        'order',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function vehicle() {
        return $this->belongsTo(Vehicle::class, 'model');
    }

    public function getDateForHumansAttribute() {
        return $this->created_at->format('d M, Y');
    }

}
