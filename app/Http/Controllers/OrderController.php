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
    // Digunakan untuk menampilkan halaman index
    public function index()
    {
        // Mengambil seluruh data dari table orders
        $orders = DB::select('SELECT * FROM orders');

        // Redirect ke halaman index (index.blade.php)
        return view('orders.index', [
            'orders' => $orders
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    // Digunakan untuk menampilkan halaman create
    public function create()
    {
        // Mengambil seluruh data dari table orders
        $spots = DB::select('SELECT * FROM spots');

        // Redirect ke halaman index (index.blade.php)
        return view('orders.create', [
            'spots' => $spots
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    // Digunakan untuk upload data dengan semua inputan disimpan pada variable $request
    public function store(StoreOrderRequest $request)
    {
        // Mengambil 1 data user_orders yang paling terakhir di tambahkan
        $userOrder = DB::select('SELECT * FROM user_orders ORDER BY id DESC limit 1');
        // Mengambil data spots berdasarkan request input yang bernama spot_id
        $selectSpot = DB::select('SELECT * FROM spots where id = ?', [$request->input('spot_id')]);

        // menginisialisasi setiap input dari variable $request
        $date = $request->input('date');
        $ticket_amount = $request->input('ticket_amount');
        $total_price = $request->input('ticket_amount') * $selectSpot[0]->ticket_price;
        $userOrderId = $userOrder[0]->id;
        $spotId = $request->input('spot_id');
        $payment_status = 'PENDING';

        // Membuat sql query untuk insert data
        $sql = "INSERT INTO orders (date, ticket_amount, payment_status, total_price, user_order_id, spot_id) VALUES (?, ?, ?, ?, ?, ?)";
        DB::insert($sql, [$date, $ticket_amount, $payment_status, $total_price, $userOrderId, $spotId]);

        // Redirect halaman ketika data telah ditambahkan
        return redirect()->route('order.index');
    }

    /**
     * Display the specified resource.
     */
    // Menampilkan data detail secara spesifik
    public function show($id)
    {
        // Mengambil 1 data dari table orders berdasarkan id yang dibawa oleh parameter
        $selectOrder = DB::select('SELECT * FROM orders where id = ? limit 1', [$id]);
        // Mengambil 1 data dari table user_orders yang mana id sama dengan atribut user_order_id
        $userOrder = DB::select('SELECT * FROM user_orders where id = ? limit 1', [$selectOrder[0]->user_order_id]);
        // Mengambil 1 data dari table spots yang mana id sama dengan atribut spot_id
        $selectSpot = DB::select('SELECT * FROM spots where id = ? limit 1', [$selectOrder[0]->spot_id]);
        // Mengambil 1 data dari table users yang mana id sama dengan atribut user_id
        $selectUser = DB::select('SELECT * FROM users where id = ? limit 1', [$userOrder[0]->user_id]);

        // Menampilkan halaman show pada folder orders dengan membawa seluruh variable yang sudah dibuat sebelumnya
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
    // Mengelola halaman edit
    public function edit($id)
    {
        // Mengambil 1 data dari table orders berdasarkan id yang dibawa oleh parameter
        $selectOrder = DB::select('SELECT * FROM orders where id = ? limit 1', [$id]);
        // Mengambil 1 data dari table user_orders yang mana id sama dengan atribut user_order_id
        $userOrder = DB::select('SELECT * FROM user_orders where id = ? limit 1', [$selectOrder[0]->user_order_id]);
        // Mengambil 1 data dari table spots yang mana id sama dengan atribut spot_id
        $selectSpot = DB::select('SELECT * FROM spots where id = ? limit 1', [$selectOrder[0]->spot_id]);
        // Mengambil seluruh data dari table spots
        $spots = DB::select('SELECT * FROM spots');

        // Menampilkan halaman edit pada folder orders dengan membawa seluruh variable yang sudah dibuat sebelumnya
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
    // Mengelola update data
    public function update(UpdateOrderRequest $request, $id)
    {
        // Mengambil 1 data dari table orders berdasarkan id yang dibawa oleh parameter
        $selectOrder = DB::select('SELECT * FROM orders where id = ? limit 1', [$id]);
        // Mengambil 1 data dari table user_orders yang mana id sama dengan atribut user_order_id
        $userOrder = DB::select('SELECT * FROM user_orders where id = ? limit 1', [$selectOrder[0]->user_order_id]);
        // Mengambil 1 data dari table spots yang mana id sama dengan input yang bernama spot_id
        $selectSpot = DB::select('SELECT * FROM spots where id = ?', [$request->input('spot_id')]);

        // menginisialisasi setiap input dari variable $request
        $date = $request->input('date');
        $ticket_amount = $request->input('ticket_amount');
        $total_price = $request->input('ticket_amount') * $selectSpot[0]->ticket_price;
        $userOrderId = $userOrder[0]->id;
        $spotId = $request->input('spot_id');

        // Membuat sql query untuk update data yang mana id merupakan $id dari parameter 
        $sql = "UPDATE orders SET date = ?, ticket_amount = ?, total_price = ?, spot_id = ? where id = ?";
        DB::insert($sql, [$date, $ticket_amount, $total_price, $spotId, $id]);

        // Redirect halaman ke index ketika data telah diupdate
        return redirect()->route('order.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    // Menghapus data berdasarkan id dari parameter
    public function destroy($id)
    {
        // Memilih data terlebih dahulu dari table orders
        $selectOrder = DB::select('SELECT * FROM orders where id = ? limit 1', [$id]);
        // Menghapus data orders berdasarkan id dari parameter
        DB::delete('DELETE FROM orders where id = ?', [$id]);
        // Menghapus data user_orders berdasarkan user_order_id dari $selectOrder
        DB::delete('DELETE FROM user_orders where id = ?', [$selectOrder[0]->user_order_id]);

        // Redirect halaman ke index ketika data telah dihapus
        return redirect()->route('order.index');
    }

    // Menampilkan halaman orders.pay dengan menerima parameter $id
    public function paymentPage($id)
    {
        $selectOrder = DB::select('SELECT * FROM orders where id = ? limit 1', [$id]);
        $userOrder = DB::select('SELECT * FROM user_orders where id = ? limit 1', [$selectOrder[0]->user_order_id]);
        $selectSpot = DB::select('SELECT * FROM spots where id = ? limit 1', [$selectOrder[0]->spot_id]);
        $selectUser = DB::select('SELECT * FROM users where id =? limit 1', [$userOrder[0]->user_id]);

        // Membuat variable dari \Midtrans\Config untuk payment
        \Midtrans\Config::$serverKey = env('MIDTRANS_SERVER_KEY');
        \Midtrans\Config::$isProduction = false;
        \Midtrans\Config::$isSanitized = false;
        \Midtrans\Config::$is3ds = false;

        // Menambahkan parameter yang digunakan untuk melakukan payment
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

        // Membuat snap token dari \Midtrans\Snap dengan method getSnapToken() dan parameter $params 
        $snapToken = \Midtrans\Snap::getSnapToken($params);

        // Menampilkan halaman pay
        return view('orders.pay', [
            'order' => $selectOrder,
            'user_order' => $userOrder,
            'spot' => $selectSpot,
            'user' => $selectUser,
            'snap_token' => $snapToken
        ]);
    }

    // Mengelola pembayaran
    public function payment(PaymentRequest $request)
    {
        // Membuat input string yang bernama json menjadi json kembali 
        $json = json_decode($request->input('json'));
        $order_id = $request->input('order_id');

        // Mengambil data dari input json
        $transaction_status = strtoupper($json->transaction_status);
        $transaction_id = $json->transaction_id;

        // Melakukan update untuk status dan snap_token
        $sql = "UPDATE orders SET payment_status = ?, snap_token = ? where id = ?";
        DB::insert($sql, [$transaction_status, $transaction_id, $order_id]);

        // Redirect halaman ke index ketika telah melakukan pembayaran
        return redirect()->route('order.index');
    }
}
