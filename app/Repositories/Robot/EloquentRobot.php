<?php

namespace App\Repositories\Robot;

use App\Models\Robot;

class EloquentRobot implements RobotRepository
{
    /**
     * {@inheritdoc}
     */
    public function paginate(?int $limit = 25)
    {
        return Robot::paginate($limit);
    }

    /**
     * {@inheritdoc}
     */
    public function find(string $id)
    {
        return Robot::findOrFail($id);
    }
}
