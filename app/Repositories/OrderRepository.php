<?php

namespace App\Repositories;

use App\Models\Order;
use App\Repositories\EloquentRepository;

class OrderRepository extends EloquentRepository
{
    public function getModel()
    {
        return Order::class;
    }

    public function descFirst($customer_id)
    {
        return $this->model->where('customer_id', '=', $customer_id)->orderBy('id' ,'DESC')->first();
    }
}
