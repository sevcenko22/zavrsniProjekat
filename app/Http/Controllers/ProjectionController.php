<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProjectionRequest;
use App\Models\Projection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProjectionController extends Controller
{
    public function createProjection(Request $request){
        DB::table('projections')->insert([
            'movie_id' => $request->movie_id,
            'room_id' => $request->room_id,
            //'ticket_id' => $request->ticket_id,
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
