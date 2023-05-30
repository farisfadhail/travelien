<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;
use App\Http\Requests\PaymentRequest;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = DB::select('SELECT * FROM orders');

        return view('orders.index', [
            'orders' => $orders
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $spots = DB::select('SELECT * FROM spots');

        return view('orders.create', [
            'spots' => $spots
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreOrderRequest $request)
    {
        $userOrder = DB::select('SELECT * FROM user_orders ORDER BY id DESC limit 1');
        $selectSpot = DB::select('SELECT * FROM spots where id = ?', [$request->input('spot_id')]);

        $date = $request->input('date');
        $ticket_amount = $request->input('ticket_amount');
        $total_price = $request->input('ticket_amount') * $selectSpot[0]->ticket_price;
        $userOrderId = $userOrder[0]->id;
        $spotId = $request->input('spot_id');
        $payment_status = 'PENDING';

        $sql = "INSERT INTO orders (date, ticket_amount, payment_status, total_price, user_order_id, spot_id) VALUES (?, ?, ?, ?, ?, ?)";
        DB::insert($sql, [$date, $ticket_amount, $payment_status, $total_price, $userOrderId, $spotId]);

        return redirect()->route('order.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $selectOrder = DB::select('SELECT * FROM orders where id = ? limit 1', [$id]);
        $userOrder = DB::select('SELECT * FROM user_orders where id = ? limit 1', [$selectOrder[0]->user_order_id]);
        $selectSpot = DB::select('SELECT * FROM spots where id = ? limit 1', [$selectOrder[0]->spot_id]);
        $selectUser = DB::select('SELECT * FROM users where id = ? limit 1', [$userOrder[0]->user_id]);

        return view('orders.show', [
            'order' => $selectOrder,
            'user_order' => $userOrder,
            'spot' => $selectSpot,
            'user' => $selectUser
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $selectOrder = DB::select('SELECT * FROM orders where id = ? limit 1', [$id]);
        $userOrder = DB::select('SELECT * FROM user_orders where id = ? limit 1', [$selectOrder[0]->user_order_id]);
        $selectSpot = DB::select('SELECT * FROM spots where id = ? limit 1', [$selectOrder[0]->spot_id]);
        $spots = DB::select('SELECT * FROM spots');

        return view('orders.edit', [
            'order' => $selectOrder,
            'user_order' => $userOrder,
            'spot' => $selectSpot,
            'spots' => $spots
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateOrderRequest $request, $id)
    {
        $selectOrder = DB::select('SELECT * FROM orders where id = ? limit 1', [$id]);
        $userOrder = DB::select('SELECT * FROM user_orders where id = ? limit 1', [$selectOrder[0]->user_order_id]);
        $selectSpot = DB::select('SELECT * FROM spots where id = ?', [$request->input('spot_id')]);

        $date = $request->input('date');
        $ticket_amount = $request->input('ticket_amount');
        $total_price = $request->input('ticket_amount') * $selectSpot[0]->ticket_price;
        $userOrderId = $userOrder[0]->id;
        $spotId = $request->input('spot_id');

        $sql = "UPDATE orders SET date = ?, ticket_amount = ?, total_price = ?, spot_id = ? where id = ?";
        DB::insert($sql, [$date, $ticket_amount, $total_price, $spotId, $id]);

        return redirect()->route('order.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $selectOrder = DB::select('SELECT * FROM orders where id = ? limit 1', [$id]);
        DB::delete('DELETE FROM orders where id = ?', [$id]);
        DB::delete('DELETE FROM user_orders where id = ?', [$selectOrder[0]->user_order_id]);

        return redirect()->route('order.index');
    }

    public function paymentPage($id)
    {
        $selectOrder = DB::select('SELECT * FROM orders where id = ? limit 1', [$id]);
        $userOrder = DB::select('SELECT * FROM user_orders where id = ? limit 1', [$selectOrder[0]->user_order_id]);
        $selectSpot = DB::select('SELECT * FROM spots where id = ? limit 1', [$selectOrder[0]->spot_id]);
        $selectUser = DB::select('SELECT * FROM users where id =? limit 1', [$userOrder[0]->user_id]);

        \Midtrans\Config::$serverKey = env('MIDTRANS_SERVER_KEY');
        \Midtrans\Config::$isProduction = false;
        \Midtrans\Config::$isSanitized = false;
        \Midtrans\Config::$is3ds = false;

        $params = array(
            'transaction_details' => array(
                'order_id' => rand(),
                'gross_amount' => $selectOrder[0]->total_price,
            ),
            'item_details' => array(
                [
                    'id' => rand(),
                    'price' => $selectSpot[0]->ticket_price,
                    'quantity' => $selectOrder[0]->ticket_amount,
                    'name' => 'Ticket for '.$selectSpot[0]->spot_name
                ]
            ),
            'customer_details' => array(
                'first_name' => $userOrder[0]->name,
                'email' => $selectUser[0]->email,
                'phone' => $userOrder[0]->phone,
            ),
        );

        $snapToken = \Midtrans\Snap::getSnapToken($params);

        return view('orders.pay', [
            'order' => $selectOrder,
            'user_order' => $userOrder,
            'spot' => $selectSpot,
            'user' => $selectUser,
            'snap_token' => $snapToken
        ]);
    }

    public function payment(PaymentRequest $request)
    {
        $json = json_decode($request->input('json'));
        $order_id = $request->input('order_id');

        $transaction_status = strtoupper($json->transaction_status);
        $transaction_id = $json->transaction_id;

        $sql = "UPDATE orders SET payment_status = ?, snap_token = ? where id = ?";
        DB::insert($sql, [$transaction_status, $transaction_id, $order_id]);

        return redirect()->route('order.index');
    }
}
