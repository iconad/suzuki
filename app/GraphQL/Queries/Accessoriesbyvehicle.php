<?php

namespace App\GraphQL\Queries;

use App\Models\Accessory;

class Accessoriesbyvehicle
{
    /**
     * @param  null  $_
     * @param  array<string, mixed>  $args
     */
    public function __invoke($_, array $args)
    {
        return Accessory::where('vehicle_id', $args['vehicle_id'])
        ->where('status', 1)
        ->get();
    }
}
