<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\OrderDetail;

class Order extends Model
{
    public function orderdetails()
    {
        return $this->hasMany(OrderDetail::class);
    }
}
