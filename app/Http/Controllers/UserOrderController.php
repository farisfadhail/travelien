<?php

namespace App\Http\Controllers;

use App\Models\UserOrder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreUserOrderRequest;
use App\Http\Requests\UpdateUserOrderRequest;

class UserOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    // Menampilkan halaman create
    public function create()
    {
        return view('userOrders.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    // Menambahkan data ke table user_orders
    public function store(StoreUserOrderRequest $request)
    {
        // Menginisialisasi setiap input
        $user_id = Auth::id();
        $name = $request->input('name');
        $identity_number = $request->input('identity_number');
        $phone = $request->input('phone');

        // Menambahkan query untuk menambahkan data
        $sql = "INSERT INTO user_orders (user_id, name, identity_number, phone) VALUES (?, ?, ?, ?)";
        DB::insert($sql, [$user_id, $name, $identity_number, $phone]);

        // Redirect ke halaman order.create ketika data berhasil ditambahkan
        return redirect()->route('order.create');
    }

    /**
     * Display the specified resource.
     */
    public function show(UserOrder $userOrder)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    // Menampilkan halaman edit berdasarkan data dari parameter $id
    public function edit($id)
    {
        $userOrder = DB::select('SELECT * FROM user_orders where id = ? limit 1', [$id]);

        return view('userOrders.edit', [
            'user_order' => $userOrder
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    // Melakukan update data berdasarkan data dari parameter $id
    public function update(UpdateUserOrderRequest $request, $id)
    {
        // Menginisialisasi setiap input
        $name = $request->input('name');
        $identity_number = $request->input('identity_number');
        $phone = $request->input('phone');

        // Menambahkan query untuk mengupdate data
        $sql = "UPDATE user_orders SET name = ?, identity_number = ?, phone = ? WHERE id = ?";
        DB::update($sql, [$name, $identity_number, $phone, $id]);

        // Mengambil data order secara spesifik untuk kemudian digunakan saat redirect halaman ke halaman order.edit
        $selectOrder = DB::select('SELECT * FROM orders where user_order_id = ? limit 1', [$id]);
        return redirect()->route('order.edit', $selectOrder[0]->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UserOrder $userOrder)
    {
        //
    }
}
