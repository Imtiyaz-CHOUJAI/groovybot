<?php

namespace App\Repositories\User;

use App\Models\User;

class EloquentUser implements UserRepository
{
    /**
     * {@inheritdoc}
     */
    public function register(array $data)
    {
        return User::create($data);
    }
}
