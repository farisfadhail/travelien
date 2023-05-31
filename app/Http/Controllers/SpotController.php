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
        $spots = DB::select('SELECT * FROM spots');

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
    public function store(StoreSpotRequest $request)
    {
        // Menginisialisasi setiap input
        $spot_name = $request->input('spot_name');
        $ticket_price = $request->input('ticket_price');
        $village = $request->input('village');
        $district = $request->input('district');

        // Menambahkan query untuk insert data
        $sql = "INSERT INTO spots (spot_name, ticket_price, village, district) VALUES (?, ?, ?, ?)";
        DB::insert($sql, [$spot_name, $ticket_price, $village, $district]);

        // Redirect ke halaman index
        return redirect()->route('spot.index');
    }

    /**
     * Display the specified resource.
     */
    // Menampilkan detail data dengan mengambil parameter $id
    public function show($id)
    {
        $spot = DB::select('SELECT * FROM spots where id = ?', [$id]);

        return view('spots.show', [
            'spot' => $spot
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    // Menampilkan halaman edit dengan menerima parameter $id
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
    // Melakukan update data berdasarkan parameter $id
    public function update(UpdateSpotRequest $request, $id)
    {
        // Menginisialisasi setiap inputnya
        $spot_name = $request->input('spot_name');
        $ticket_price = $request->input('ticket_price');
        $village = $request->input('village');
        $district = $request->input('district');

        // Menambahkan query untuk update data
        $sql = "UPDATE spots SET spot_name = ?, ticket_price = ?, village = ?, district = ? WHERE id = ?";
        DB::update($sql, [$spot_name, $ticket_price, $village, $district, $id]);

        // Redirect ke halaman spot.index
        return redirect()->route('spot.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    // Menghapus data berdasarkan parameter id
    public function destroy($id)
    {
        DB::delete('DELETE FROM spots where id = ?', [$id]);

        return redirect()->route('spot.index');
    }
}
