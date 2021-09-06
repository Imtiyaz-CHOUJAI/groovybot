<?php

namespace App\Services;

use App\Http\Resources\DanceOffResource;
use App\Repositories\DanceOff\DanceOffRepository;

class Stage
{
    /**
     * @var int
     */
    protected const MAX_BATTLES_PER_TEAM = 5;

    /**
     * @var \Illuminate\Support\Collection
     */
    private $scoreBoard;

    /**
     * @var \Illuminate\Support\Collection
     */
    private $battles;

    /**
     * @var \Illuminate\Support\Collection
     */
    private $contenders;

    /**
     * Create a new Stage instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->contenders = collect([]);
        $this->scoreBoard = collect([]);
        $this->battles = collect([]);
    }

    /**
     * Initiate the contenders and the score board for each team
     *
     * @param  array  $teamMembers
     * @param  string  $teamName
     * @return Stage
     */
    public function setContenders(array $teamMembers, string $teamName)
    {
        // Set the score board for the team
        $this->scoreBoard->push((object) [
            'name' => $teamName,
            'score' => 0,
        ]);

        // Group all robots and their respective teams into the contenders collection
        foreach ($teamMembers as $key => $teamMember) {
            $this->contenders->push((object) [
                'robot' => $teamMember,
                'team' => $teamName,
                'battleNumber' => $key,
            ]);
        }

        return $this;
    }

    /**
     * Initiate the battles for the contenders
     *
     * @param  \App\Repositories\DanceOff\DanceOffRepository  $danceOffRepository
     * @return Stage
     */
    public function initiateBattles(DanceOffRepository $danceOffRepository)
    {
        for ($i = 0; $i <= Stage::MAX_BATTLES_PER_TEAM - 1; $i++) {
            // Find the contenders for each battle
            [$firstContender, $secondContender] = $this->contenders->where('battleNumber', $i)->values();

            // Cue music
            $dance = $danceOffRepository->dance($firstContender->robot, $secondContender->robot);

            // Register the dance in the battles collection
            $this->battles->push(new DanceOffResource($dance));

            // Set the score for the winning team
            $this->setScoreBoard($dance->winner_id);
        }

        return $this;
    }

    /**
     * Increment the score for the winning team based on the winning robot
     *
     * @param  integer  $winner
     * @return void
     */
    public function setScoreBoard(int $winner)
    {
        // Find the winner's team name in the contenders
        $winner = $this->contenders->where('robot', $winner)
            ->first()
            ->team;

        // Increase the teams score
        $this->scoreBoard->where('name', $winner)
            ->first()
            ->score++;
    }

    /**
     * Return the winning team with the maximum score
     *
     * @return object
     */
    public function retrieveWinningTeam()
    {
        $winner = $this->scoreBoard->sortByDesc('score')->first();

        return (object) [
            'winner' => 'The winner of this dance off is the ' . $winner->name,
            'battles' => $this->battles,
        ];
    }
}
