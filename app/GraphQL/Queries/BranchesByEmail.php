<?php

namespace App\GraphQL\Queries;

use App\Models\Branch;

class BranchesByEmail
{
    /**
     * @param  null  $_
     * @param  array<string, mixed>  $args
     */
    public function __invoke($_, array $args)
    {
        if(count($args) != 0) {
            $type = explode(" ", $args['type']);
        }else{
            $type = ['services', 'showroom', 'parts'];
        }

        return Branch::has('offices')
        ->whereHas('offices', function ($query) use ($type) {
            $query->whereIn('type', $type);
        })
        ->where('status', 1)
        ->get();
    }
}
