<?php

namespace App\Http\Controllers;

use App\Models\Spectator;
use App\Http\Requests\StoreSpectatorRequest;
use App\Http\Requests\UpdateSpectatorRequest;
 /**
     * @OA\Get(
     *     path="/spectator",
     *     summary="Spectator information",
     *     description="Using GET HTTP method to present spectators' information from the cinema database",
     *     tags={"Spectator"},
     *     @OA\Parameter(
     *         name = "first_name",
     *         in="query",
     *         description="Spectator's first name",
     *         required=true,
     *     ),
     *      @OA\Parameter(
     *      name="last_name",
     *      in="query",
     *      description="Spectator's last name",  
     *      required=true,
     *     ),
     *     @OA\Parameter(
     *      name="email",
     *      in="query",
     *      description="Spectator's email address",  
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
class SpectatorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(Spectator::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreSpectatorRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSpectatorRequest $request)
    {
        $spectator = Spectator::create($request->validated());
        return response()->json($spectator);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Spectator  $spectator
     * @return \Illuminate\Http\Response
     */
    public function show(Spectator $spectator)
    {
        return response()->json($spectator);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Spectator  $spectator
     * @return \Illuminate\Http\Response
     */
    public function edit(Spectator $spectator)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSpectatorRequest  $request
     * @param  \App\Models\Spectator  $spectator
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSpectatorRequest $request, Spectator $spectator)
    {
        $spectator->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email
        ]);
        return response()->json($spectator);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Spectator  $spectator
     * @return \Illuminate\Http\Response
     */
    public function destroy(Spectator $spectator)
    {
        $spectator->delete();
        return response()->json($spectator);
    }
}
