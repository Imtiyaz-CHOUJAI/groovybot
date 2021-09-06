<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Robot extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'power_move',
        'experience',
        'out_of_order',
        'avatar',
    ];

    /**
     * Collection of power moves that can be performed by the robot
     *
     * @var array
     */
    public const POWER_MOVES = [
        '3 Step',
        '6 Step',
        '12 Step',
        'Windmill',
        'Head slide',
        'Air Chair',
        'Flares',
    ];

    /**
     * Participated Dance offs
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function danceOffs()
    {
        return $this->hasMany(DanceOff::class, 'first_contender_id')
            ->hasMany(DanceOff::class, 'second_contender_id');
    }

    /**
     * Won Dance offs
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function won()
    {
        return $this->hasMany(DanceOff::class, 'winner_id');
    }
}
