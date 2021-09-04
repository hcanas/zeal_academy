<?php

namespace App\Http\Controllers;

use App\Models\Scholar;
use App\Services\StatisticsService;
use Illuminate\Http\Request;

class ScholarController extends Controller
{
    public function __construct()
    {

    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
        $scholars = Scholar::query()
            ->orderBy('in_game_slp', 'desc')
            ->paginate($request->input('per_page', 25))
            ->appends($request->input());

        if ($scholars->isNotEmpty()) {
            return response()->json($scholars);
        } else {
            return response()->json('No records found.', 404);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $id
     * @param StatisticsService $statistics_service
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id, StatisticsService $statistics_service)
    {
        $scholar = Scholar::query()
            ->with('axies.parts.card')
            ->where('id', $id)
            ->first();

        if ($scholar === null) {
            return response()->json('Scholar not found.', 404);
        } else {
            return response()->json($scholar);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
