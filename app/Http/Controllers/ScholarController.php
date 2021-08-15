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
     * @param  string  $address
     * @param StatisticsService $statistics_service
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($address, StatisticsService $statistics_service)
    {
        $scholar = Scholar::query()
            ->with('axies.parts.card')
            ->where('address', $address)
            ->first();

        if ($scholar === null) {
            return response()->json('Scholar not found.', 404);
        } else {
            $scholar->earnings = $statistics_service->earnings($scholar->address);
            $scholar->leaderboards = $statistics_service->leaderboards($scholar->address);
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
