<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
 /**
     * @OA\Post(
     *     path="/api/ticket",
     *     summary="Ticket buy",
     *     description="Posting spectators' ticket information in the cinema database",
     *     tags={"Ticket"},
     *     @OA\Parameter(
     *         name = "spectator_id",
     *         in="query",
     *         description="Number of the spectator of projection",
     *         required=true,
     *     ),
     *      @OA\Parameter(
     *      name="projection.id",
     *      in="query",
     *      description="Number of projection of the movie ",  
     *      required=true,
     *     ),
     *     @OA\Parameter(
     *      name="ticket_type",
     *      in="query",
     *      description="Type of the ticket offered in the cinema (children, retiree, regular)",  
     *      required=true,
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="OK",
     *         @OA\MediaType(
     *             mediaType="application/json",
     *        )
     *     ),
     *  
     * )
     */
class HomeController extends Controller
{
    public function index(Request $request){
        return response()->json([
            'name' => $request->input('name'),
        ]);
    }

}
