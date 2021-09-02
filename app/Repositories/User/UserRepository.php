<?php

namespace App\Repositories\User;

use App\Models\User;

interface UserRepository
{
    /**
     * Register a new user
     *
     * @param array $data
     * @return User
     */
    public function register(array $data);
}
