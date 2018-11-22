<?php

namespace App\Repositories;

use App\Models\User;
use App\Repositories\EloquentRepository;

class UserRepository extends EloquentRepository
{
    public function getModel()
    {
        return User::class;
    }

    public function countAdmin()
    {
        return $this->model->where('role', config('custom.admin'))->count();
    }

    public function countCustomer()
    {
        return $this->model->where('role', config('custom.customer'))->count();
    }
}
