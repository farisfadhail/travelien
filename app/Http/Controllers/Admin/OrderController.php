<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Mengambil seluruh data dari table orders dengan melakukan join pada table user_orders dan spots
        $orders = Order::join('user_orders', 'orders.user_order_id', '=', 'user_orders.id')
            ->join('spots', 'orders.spot_id', '=', 'spots.id')
            ->select('orders.*', 'user_orders.*', 'spots.*', 'orders.id as order_id')
            ->get();

        // Redirect ke halaman index (index.blade.php)
        return view('admin.orders.index', [
            'orders' => $orders
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        // Mengambil seluruh data dari table orders dengan melakukan join pada table user_orders dan spots
        $selectOrder = Order::join('user_orders', 'orders.user_order_id', '=', 'user_orders.id')
            ->join('spots', 'orders.spot_id', '=', 'spots.id')
            ->where('orders.id', $order->id)
            ->select('orders.*', 'user_orders.*', 'spots.spot_name', 'orders.id as order_id')
            ->get();

        // Menampilkan halaman show pada folder orders dengan membawa seluruh variable yang sudah dibuat sebelumnya
        return view('admin.orders.show', [
            'order' => $selectOrder,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        //
    }
}
