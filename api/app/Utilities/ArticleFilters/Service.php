<?php

namespace App\Utilities\ArticleFilters;

use App\Utilities\FilterContract;
use App\Utilities\QueryFilter;

class Service extends QueryFilter implements FilterContract
{
    public function handle($value): void
    {
        $this->query->whereHas('services', function ($q) use ($value) {
            return $q->where('title', $value);
        });
    }
}
