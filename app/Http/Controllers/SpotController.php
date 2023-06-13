<?php

namespace App\Http\Controllers;

use App\Models\Spot;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreSpotRequest;
use App\Http\Requests\UpdateSpotRequest;
use App\Models\Order;

class SpotController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // Menampilkan halaman index
    public function index()
    {
        // Mengambil seluruh data dari table spots
        $spots = Spot::all();

        // Redirect ke halaman index (index.blade.php)
        return view('pages.spots.index', [
            'spots' => $spots
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    // Menampilkan halaman create
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSpotRequest $request, Spot $spot)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    // Menampilkan detail data dengan mengambil data dari Spot
    public function show(Spot $spot)
    {
        $spot = Spot::find($spot->id);
        $spot_image = $spot->getFirstMediaUrl('images');
        $orders = Order::where('spot_id', $spot->id)->count();

        return view('pages.spots.detail', [
            'spot' => $spot,
            'spot_image' => $spot_image,
            'orders' => $orders
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    // Menampilkan halaman edit
    public function edit(Spot $spot)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    // Melakukan update data
    public function update(UpdateSpotRequest $request, Spot $spot)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    // Menghapus data berdasarkan parameter id
    public function destroy(Spot $spot)
    {
        //
    }
}
