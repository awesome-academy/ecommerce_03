<?php

namespace App\Repositories;

use App\Models\OrderDetail;
use App\Repositories\EloquentRepository;

class OrderDetailRepository extends EloquentRepository
{
    public function getModel()
    {
        return OrderDetail::class;
    }
}
