<?php

namespace App\Repositories\DanceOff;

interface DanceOffRepository
{
    /**
     * Dance
     *
     * @param  int  $firstContender
     * @param  int  $secondContender
     * @return \App\Models\DanceOff
     */
    public function dance(int $firstContender, int $secondContender);

    /**
     * Paginate the dance-offs
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function danceOffs(?int $limit = 25);
}
