<?php

namespace App\Http\Controllers;

use App\Models\Spot;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreSpotRequest;
use App\Http\Requests\UpdateSpotRequest;

class SpotController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //$spots = Spot::all();

        $spots = DB::select('SELECT * FROM spots');

        return view('spots.index', [
            'spots' => $spots
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('spots.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSpotRequest $request)
    {
        //return $request;

        $spot_name = $request->input('spot_name');
        $ticket_price = $request->input('ticket_price');
        $village = $request->input('village');
        $district = $request->input('district');

        $sql = "INSERT INTO spots (spot_name, ticket_price, village, district) VALUES (?, ?, ?, ?)";
        DB::insert($sql, [$spot_name, $ticket_price, $village, $district]);

        return redirect()->route('spot.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $spot = DB::select('SELECT * FROM spots where id = ?', [$id]);

        return $spot;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $spot = DB::select('SELECT * FROM spots where id = ?', [$id]);

        return view('spots.edit', [
            'spot' => $spot
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSpotRequest $request, $id)
    {
        $spot_name = $request->input('spot_name');
        $ticket_price = $request->input('ticket_price');
        $village = $request->input('village');
        $district = $request->input('district');

        $sql = "UPDATE spots SET spot_name = ?, ticket_price = ?, village = ?, district = ? WHERE id = ?";
        DB::update($sql, [$spot_name, $ticket_price, $village, $district, $id]);

        return redirect()->route('spot.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        DB::delete('DELETE FROM spots where id = ?', [$id]);

        return redirect()->route('spot.index');
    }
}
