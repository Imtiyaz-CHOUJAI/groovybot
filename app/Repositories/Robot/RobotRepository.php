<?php

namespace App\Repositories\Robot;

interface RobotRepository
{
    /**
     * Paginate robots
     *
     * @param  int  $data
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function paginate(?int $limit = 25);

    /**
     * find a robot by its id
     *
     * @param  string  $id
     * @return \App\Models\Robot
     */
    public function find(string $id);

    /**
     * Paginate the leader-board
     *
     * @return \Illuminate\Pagination\Paginator
     */
    public function leaderBoard(?int $limit = 25);
}
