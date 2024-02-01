<?php

namespace App\Utilities\ArticleFilters;

use App\Utilities\FilterContract;
use App\Utilities\QueryFilter;

class Subservice extends QueryFilter implements FilterContract
{
    public function handle($value): void
    {
        $this->query->whereHas('subservices', function ($q) use ($value) {
            return $q->where('title', $value);
        });
    }
}
