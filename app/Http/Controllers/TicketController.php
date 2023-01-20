<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use App\Http\Requests\StoreTicketRequest;
use App\Http\Requests\UpdateTicketRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(Ticket::all());
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
     * @param  \App\Http\Requests\StoreTicketRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTicketRequest $request)
    {
        $ticket = Ticket::create($request->validated());
        return response()->json($ticket);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function show(Ticket $ticket)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function edit(Ticket $ticket)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTicketRequest  $request
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTicketRequest $request, Ticket $ticket)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ticket $ticket)
    {
        //
    }

    public function mostWatched(Request $request){
        $date = $request->date;

        $mostWatchedMoviesADay = DB::table('projections')
            ->join('movies', 'movies.id', '=', 'projections.movie_id')
            ->select(DB::raw('count(projections.movie_id) as no_of_projections, title'))
            ->where('projections.date', 'like', '%'.$date.'%')
            ->groupBy('projections.movie_id', 'movies.title')
            ->orderBy('no_of_projections', 'desc')
            ->limit(1)
            ->get();

        return response()->json($mostWatchedMoviesADay);
    }


    public function occupancyList(){
        $occupancy = DB::select(DB::raw("SELECT COUNT(t.id) AS 'ticket_number', r.seats_no, r.name, m.title
        FROM Tickets t
        JOIN Projections p ON p.id = t.projection_id
        JOIN Movies m ON m.id = p.movie_id
        JOIN Rooms r ON r.id = p.room_id
        GROUP by p.id, r.seats_no, r.name, m.title"));

    return response()->json($occupancy);
    }
}
