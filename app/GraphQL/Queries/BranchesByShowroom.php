<?php

namespace App\GraphQL\Queries;

use App\Models\Branch;

class BranchesByShowroom
{
    /**
     * @param  null  $_
     * @param  array<string, mixed>  $args
     */
    public function __invoke($_, array $args)
    {
        return Branch::whereNotNull('email')->whereNotNull('after_sales_email')->get();
    }
}
