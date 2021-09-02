<?php

namespace App\Repositories\Robot;

use Illuminate\Database\Eloquent\Collection;

interface RobotRepository
{
    /**
     * Paginate robots
     *
     * @param int $data
     * @return Collection
     */
    public function paginate(?int $limit = 25);

    /**
     * find a robot by its id
     *
     * @param string $id
     * @return Robot
     */
    public function find(string $id);
}
