<?php

namespace App\Repositories\DanceOff;

use App\Models\DanceOff;
use App\Models\Robot;

class EloquentDanceOff implements DanceOffRepository
{
    /**
     * {@inheritdoc}
     */
    public function dance(int $firstContender, int $secondContender)
    {
        $firstContender = Robot::findOrFail($firstContender);
        $secondContender = Robot::findOrFail($secondContender);

        $winner = $firstContender->experience >= $secondContender->experience ? $firstContender : $secondContender;

        $danceOff = new DanceOff();

        $danceOff->firstContender()
            ->associate($firstContender)
            ->secondContender()
            ->associate($secondContender)
            ->winner()
            ->associate($winner)
            ->save();

        return $danceOff;
    }

    /**
     * {@inheritdoc}
     */
    public function danceOffs(?int $limit = 25)
    {
        return DanceOff::paginate($limit);
    }
}
