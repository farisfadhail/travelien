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
    // Menampilkan halaman index
    public function index()
    {
        // Mengambil seluruh data dari table spots
        $spots = Spot::all();

        // Redirect ke halaman index (index.blade.php)
        return view('spots.index', [
            'spots' => $spots
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    // Menampilkan halaman create
    public function create()
    {
        return view('spots.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSpotRequest $request, Spot $spot)
    {
        // Melakukan validasi pada inputan
        $request->validated();

        // Menginisialisasi setiap input
        $data = [
            'spot_name' => $request->input('spot_name'),
            'ticket_price' => $request->input('ticket_price'),
            'village' => $request->input('village'),
            'district' => $request->input('district'),
        ];

        // Menambahkan query untuk insert data
        $spot->create($data);

        // Redirect ke halaman index
        return redirect()->route('spot.index');
    }

    /**
     * Display the specified resource.
     */
    // Menampilkan detail data dengan mengambil data dari Spot
    public function show(Spot $spot)
    {
        return view('spots.show', [
            'spot' => $spot
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    // Menampilkan halaman edit
    public function edit(Spot $spot)
    {
        return view('spots.edit', [
            'spot' => $spot
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    // Melakukan update data
    public function update(UpdateSpotRequest $request, Spot $spot)
    {
        // Melakukan validasi pada inputan
        $request->validated();

        // Menginisialisasi setiap inputnya
        $data = [
            'spot_name' => $request->input('spot_name'),
            'ticket_price' => $request->input('ticket_price'),
            'village' => $request->input('village'),
            'district' => $request->input('district'),
        ];

        // Melakukan update
        $spot->update($data);

        // Redirect ke halaman spot.index
        return redirect()->route('spot.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    // Menghapus data berdasarkan parameter id
    public function destroy(Spot $spot)
    {
        // Menghapus data spot
        $spot->delete();

        // Redirect ke halaman spot.index
        return redirect()->route('spot.index');
    }
}
