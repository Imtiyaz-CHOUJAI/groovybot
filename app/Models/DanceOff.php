<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DanceOff extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_contender_id',
        'second_contender_id',
        'winner_id',
    ];

    /**
     * First contender
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function firstContender()
    {
        return $this->belongsTo(Robot::class);
    }

    /**
     * Second contender
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function secondContender()
    {
        return $this->belongsTo(Robot::class);
    }

    /**
     * Dance off winner
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function winner()
    {
        return $this->belongsTo(Robot::class);
    }
}
