<?php

namespace App\Repositories;

use App\Models\Order;
use App\Repositories\EloquentRepository;
use Carbon\Carbon;

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

    public function getTotalPriceMonth($month)
    {
        return $this->model->whereMonth('created_at', Carbon::now()->subMonth($month))
                           ->whereYear('created_at', Carbon::now()->subMonth($month))
                           ->where('status', config('custom.two'))
                           ->sum('total_price');
    }
}
