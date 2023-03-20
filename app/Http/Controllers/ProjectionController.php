<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProjectionRequest;
use App\Models\Projection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

/**
 * @OA\Get(
 *     path="/mostWatched",
 *     summary="Retrieve the most watched movie on a specific day",
 *     description="Using GET HTTP method to retrieve the most watched movie on a specific day in the cinema database",
 *     tags={"Most-watched movie"},
 *     @OA\Parameter(
 *         name="date",
 *         in="query",
 *         description="The date for which to retrieve the most watched movie",
 *         required=true,
 *         @OA\Schema(
 *             type="string",
 *             format="date",
 *         ),
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="The most watched movie on the specified date",
 *         @OA\MediaType(
 *             mediaType="application/json",
 *             @OA\Schema(
 *                 type="array",
 *                 @OA\Items(
 *                     type="object",
 *                     @OA\Property(
 *                         property="no_of_projections",
 *                         type="integer",
 *                         description="The number of projections for the most watched movie on the specified date"
 *                     ),
 *                     @OA\Property(
 *                         property="title",
 *                         type="string",
 *                         description="The title of the most watched movie on the specified date"
 *                     ),
 *                 ),
 *             ),
 *         ),
 *     ),
 * )
 */

class ProjectionController extends Controller
{
    public function createProjection(Request $request){
        DB::table('projections')->insert([
            'movie_id' => $request->movie_id,
            'room_id' => $request->room_id,
            'time' => $request->time,
            'date' => $request->date
        ]);
        return "Movie projection added succesfully!";
    }


    public function getProjections(){
        $projections = DB::table('projections')->get();
        return response()->json($projections);
    }
}
