<?php

namespace App\Http\Controllers;

use App\Http\Resources\DanceOffCollection;
use App\Repositories\DanceOff\DanceOffRepository;
use App\Services\Stage;
use Illuminate\Http\Request;

class DanceOffController extends Controller
{

    /**
     * @var \App\Repositories\DanceOff\DanceOffRepository $danceOffRepository
     */
    private $danceOffRepository;

    /**
     * Create a new DanceOffController instance.
     *
     * @return void
     */
    public function __construct(DanceOffRepository $danceOffRepository)
    {
        $this->middleware('auth:api');

        $this->danceOffRepository = $danceOffRepository;
    }

    /**
     * Retrieve individual robot.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function dance(Request $request)
    {
        // Validate the teams
        $this->validate($request, [
            'firstTeam' => 'required|array|min:5|max:5',
            'secondTeam' => 'required|array|min:5|max:5',
            'firstTeam.*' => 'required|numeric|exists:robots,id|distinct',
            'secondTeam.*' => 'required|numeric|exists:robots,id|distinct',
        ]);

        try {
            $firstTeam = $request->get('firstTeam');
            $secondTeam = $request->get('secondTeam');

            // Make sure there are unique robots in the teams (robot doesn't exist in both teams)
            $robots = collect(array_merge($firstTeam, $secondTeam));

            if (count($robots->duplicates()) > 0) {
                // Return error message
                return response()->json([
                    'message' => 'Robot exists in both teams!',
                ], 400);
            }

            $results = (new Stage())->setContenders($firstTeam, 'First Team')
                ->setContenders($secondTeam, 'Second Team')
                ->initiateBattles($this->danceOffRepository)
                ->retrieveWinningTeam();

            // Return the dance results
            return response()->json([
                'results' => $results,
            ]);

        } catch (\Exception $e) {
            throw $e;
            // Return error message
            return response()->json([
                'message' => 'Invalid Teams Provided!',
            ], 500);
        }
    }

    /**
     * Paginate dance-offs.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \App\Http\Resources\DanceOffCollection
     */
    public function danceOffs(Request $request)
    {
        $robots = $this->danceOffRepository->danceOffs(
            $request->get('limit')
        );

        return response()->json([
            'danceOffs' => new DanceOffCollection($robots),
        ]);
    }
}
