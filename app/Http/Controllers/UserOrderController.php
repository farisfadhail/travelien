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
    public function create()
    {
        return view('userOrders.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserOrderRequest $request)
    {
        $user_id = Auth::id();
        $name = $request->input('name');
        $identity_number = $request->input('identity_number');
        $phone = $request->input('phone');

        $sql = "INSERT INTO user_orders (user_id, name, identity_number, phone) VALUES (?, ?, ?, ?)";
        DB::insert($sql, [$user_id, $name, $identity_number, $phone]);

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
    public function update(UpdateUserOrderRequest $request, $id)
    {
        $name = $request->input('name');
        $identity_number = $request->input('identity_number');
        $phone = $request->input('phone');

        $sql = "UPDATE user_orders SET name = ?, identity_number = ?, phone = ? WHERE id = ?";
        DB::update($sql, [$name, $identity_number, $phone, $id]);

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
