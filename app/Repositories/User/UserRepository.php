<?php

namespace App\Repositories\User;

interface UserRepository
{
    /**
     * Register a new user
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    public function register(array $data);
}
