<?php

namespace App\Services\Paginate;

use Illuminate\Database\Query\Builder;

interface PaginateServiceInterface
{
    public function paginate(array $options, Builder $query): array;
}
