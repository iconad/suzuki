<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BranchOffice extends Model
{
    use HasFactory;

    public $fillable = [
        'title',
        'email',
        'manager',
        'type',
        'map',
        'direction_map',
        'tel',
        'mobile',
        'fax',
        'open_days',
        'open_time',
        'branch_id',
        'user_id',
        'status',
        'order',
    ];

    public function branch() {
        return $this->belongsTo(Branch::class);
    }

}
