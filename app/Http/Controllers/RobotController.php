<?php

namespace App\Http\Controllers;

use App\Http\Resources\RobotCollection;
use App\Http\Resources\RobotResource;
use App\Repositories\Robot\RobotRepository;
use Illuminate\Http\Request;

class RobotController extends Controller
{

    /**
     * @var \App\Repositories\Robot\RobotRepository $robotRepository
     */
    private $robotRepository;

    /**
     * Create a new RobotController instance.
     *
     * @return void
     */
    public function __construct(RobotRepository $robotRepository)
    {
        $this->middleware('auth:api');

        $this->robotRepository = $robotRepository;
    }

    /**
     * Paginate robots.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
        $robots = $this->robotRepository->paginate(
            $request->get('limit')
        );

        return response()->json([
            'robots' => new RobotCollection($robots),
        ]);
    }

    /**
     * Retrieve individual robot.
     *
     * @param string $robot
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Request $request, $robot)
    {
        try {
            // Find robot by its id
            $robot = $this->robotRepository->find($robot);

            // Return robot
            return response()->json([
                'robot' => new RobotResource($robot),
            ]);

        } catch (\Exception $e) {
            // Return error message
            return response()->json([
                'message' => 'Robot Not Found!',
            ], 404);
        }
    }

    /**
     * Paginate robots leader-board.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function leaderBoard(Request $request)
    {
        $leaderBoard = $this->robotRepository->leaderBoard(
            $request->get('limit')
        );

        return response()->json([
            'leaderBoard' => new RobotCollection($leaderBoard),
        ]);
    }
}
