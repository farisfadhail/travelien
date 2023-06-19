<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Spot;
use App\Models\User;
use App\Models\Order;
use App\Models\Invoice;
use App\Models\UserOrder;
use Midtrans\Notification;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
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
        // Mengambil seluruh data dari table orders dengan melakukan join pada table user_orders dan spots
        $orders = Order::join('user_orders', 'orders.user_order_id', '=', 'user_orders.id')
            ->join('spots', 'orders.spot_id', '=', 'spots.id')
            ->where('user_orders.user_id', Auth::id())
            ->select('orders.*', 'user_orders.*', 'spots.*', 'orders.id as order_id')
            ->get();

        // Redirect ke halaman index (index.blade.php)
        return view('orders.index', [
            'orders' => $orders
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    // Digunakan untuk menampilkan halaman create
    public function create($id)
    {
        // Mengambil seluruh data dari table spots
        $spot = Spot::find($id);
        $spot_image = $spot->getFirstMediaUrl('images');

        // Redirect ke halaman create
        return view('pages.orders.create', [
            'spot' => $spot,
            'spot_image' => $spot_image
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    // Digunakan untuk upload data dengan semua inputan disimpan pada variable $request
    public function store(Request $request, Order $order, UserOrder $userOrder)
    {
        // Mengambil data spot berdasarkan $request
        $selectSpot = Spot::where('id', $request->spot_id)->get();

        // Menginisialisasi setiap input dari variable $request
        if (!empty($request->date) && !empty($request->ticket_amount)) {
            $dataUserOrder = [
                'user_id' => Auth::id(),
                'name' => $request->name,
                'identity_number' => $request->identity_number,
                'phone' => $request->phone,
            ];

            // Membuat data kemudian mengambil data yang paling terbaru
            $userOrder->create($dataUserOrder);
            $userOrder = UserOrder::latest()->first();

            // menginisialisasi setiap input dari variable $request
            $dataOrder = [
                'date' => $request->date,
                'ticket_amount' => $request->ticket_amount,
                'total_price' => $request->ticket_amount * $selectSpot[0]->ticket_price,
                'user_order_id' => $userOrder->id,
                'spot_id' => $request->spot_id,
                'payment_status' => 'pending',
            ];

            // Membuat data order
            $order->create($dataOrder);

            // Redirect halaman ketika data telah ditambahkan
            return redirect()->route('order.success');
        } else {
            return redirect()->route('user.order.create')->with('error', 'Seluruh data harus diisi');
        }
    }

    /**
     * Display the specified resource.
     */
    // Menampilkan data detail secara spesifik
    public function show(Order $order)
    {
        // Mengambil seluruh data dari table orders dengan melakukan join pada table user_orders dan spots
        $selectOrder = Order::join('user_orders', 'orders.user_order_id', '=', 'user_orders.id')
            ->join('spots', 'orders.spot_id', '=', 'spots.id')
            ->where('orders.id', $order->id)
            ->where('user_orders.user_id', Auth::id())
            ->select('orders.*', 'user_orders.*', 'spots.*', 'orders.id as order_id')
            ->get();

        $payment_date = Carbon::parse($selectOrder[0]->transaction_time)->format('H:i T j F Y');

        $code = $selectOrder[0]->slug.'-'.$selectOrder[0]->uid;

        // Menampilkan halaman show pada folder orders dengan membawa seluruh variable yang sudah dibuat sebelumnya
        return view('orders.show', [
            'order' => $selectOrder,
            'payment_date' => $payment_date,
            'code' => $code,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    // Mengelola halaman edit
    public function edit(Order $order)
    {
        // Mengambil data data yang diperlukan
        $spot = Spot::findOrFail($order->spot_id);
        $spot_image = $spot->getFirstMediaUrl('images');
        $userOrder = UserOrder::where('id', $order->user_order_id)->get();

        return view('pages.orders.edit', [
            'order' => $order,
            'spot' => $spot,
            'spot_image' => $spot_image,
            'user_order' => $userOrder
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    // Mengelola update data
    public function update(Request $request, Order $order)
    {
        $selectSpot = Spot::where('id', $request->spot_id)->get();
        // Membuat object dari model UserOrder()
        $userOrder = new UserOrder();

        // Menginisialisasi setiap input dari variable $request
        $dataUserOrder = [
            'user_id' => Auth::id(),
            'name' => $request->name,
            'identity_number' => $request->identity_number,
            'phone' => $request->phone,
        ];

        // Melakukan update pada table user_orders kemudian diambil datanya
        $userOrder->where('id', $order->user_order_id)->update($dataUserOrder);
        $getUserOrderId = $userOrder->where('id', $order->user_order_id)->get();

        // menginisialisasi setiap input dari variable $request
        $dataOrder = [
            'date' => $request->date,
            'ticket_amount' => $request->ticket_amount,
            'total_price' => $request->ticket_amount * $selectSpot[0]->ticket_price,
            'user_order_id' => $getUserOrderId[0]->id,
            'spot_id' => $request->spot_id,
            'payment_status' => 'pending',
        ];

        // Melakukan update data order
        $order->update($dataOrder);

        // Redirect halaman ke index ketika data telah diupdate
        return redirect()->route('user.order.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    // Menghapus data berdasarkan id dari parameter
    public function destroy(Order $order)
    {
        // Mencari data dari table user_orders
        $userOrder = UserOrder::where('id',$order->user_order_id);

        // jika user_ordersnya ada maka table akan dihapus, Jika tidak ada maka tidak akan dihapus
        if (!empty($userOrder)) {
            $order->delete();
            $userOrder->delete();

            // Redirect halaman ke index ketika data telah dihapus
            return redirect()->route('user.order.index')->with('success', 'Data berhasil dihapus');
        } else {
            return redirect()->route('user.order.index')->with('failed', 'Data tidak terhapus');
        }

    }

    // Menampilkan halaman orders.pay dengan menerima parameter $id
    public function paymentPage($id)
    {
        // Mengambil seluruh data dari table orders dengan melakukan join pada table user_orders dan spots
        $selectOrder = Order::join('user_orders', 'orders.user_order_id', '=', 'user_orders.id')
            ->join('spots', 'orders.spot_id', '=', 'spots.id')
            ->where('orders.id', $id)
            ->select('orders.*', 'user_orders.*', 'spots.*', 'spots.id as spot_id', 'orders.id as order_id', 'user_orders.user_id as ud_user_id')
            ->get();

        $selectUser = User::where('id', $selectOrder[0]->ud_user_id)->get();
        $spot = Spot::find($selectOrder[0]->spot_id);
        $spot_image = $spot->getFirstMediaUrl('images');

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
                    'price' => $selectOrder[0]->ticket_price,
                    'quantity' => $selectOrder[0]->ticket_amount,
                    'name' => 'Ticket for '.$selectOrder[0]->spot_name
                ]
            ),
            'customer_details' => array(
                'first_name' => $selectOrder[0]->name,
                'email' => $selectUser[0]->email,
                'phone' => $selectOrder[0]->phone,
            ),
        );

        // Membuat snap token dari \Midtrans\Snap dengan method getSnapToken() dan parameter $params
        $snapToken = \Midtrans\Snap::getSnapToken($params);

        $date = Carbon::createFromFormat('Y-m-d', $selectOrder[0]->date); // Mengubah string tanggal menjadi objek Carbon
        $formattedDate = $date->format('j F Y');

        // Menampilkan halaman pay
        return view('pages.orders.pay', [
            'order' => $selectOrder,
            'user' => $selectUser,
            'spot_image' => $spot_image,
            'formattedDate' => $formattedDate,
            'snap_token' => $snapToken
        ]);
    }

    // Mengelola pembayaran
    public function payment(PaymentRequest $request)
    {
        // Membuat input string yang bernama json menjadi json kembali
        $json = json_decode($request->input('json'));
        $order_id = $request->input('order_id');

        $order = Order::where('id', $order_id);

        // Mengambil data dari input json
        $transaction_status = $json->transaction_status;
        $transaction_id = $json->transaction_id;
        $fraud = $json->fraud_status;

        // Membuat semua kondisi yang terjadi setelah transaksi dilakukan
        if ($transaction_status == 'capture') {
            if ($fraud == 'challenge') {
                // TODO Set payment status in merchant's database to 'challenge'
                $transactionStatus = 'pending';
            }
            else if ($fraud == 'accept') {
                // TODO Set payment status in merchant's database to 'success'
                $transactionStatus = 'paid';
            }
        }
        else if ($transaction_status == 'cancel') {
            if ($fraud == 'challenge') {
                // TODO Set payment status in merchant's database to 'failure'
                $transactionStatus = 'failed';
            }
            else if ($fraud == 'accept') {
                // TODO Set payment status in merchant's database to 'failure'
                $transactionStatus = 'failed';
            }
        }
        else if ($transaction_status == 'deny') {
            // TODO Set payment status in merchant's database to 'failure'
            $transactionStatus = 'failed';
        }
        else if ($transaction_status == 'settlement') {
            // TODO set payment status in merchant's database to 'Settlement'
            $transactionStatus = 'paid';
        }
        else if ($transaction_status == 'pending') {
            // TODO set payment status in merchant's database to 'Pending'
            $transactionStatus = 'pending';
        }
        else if ($transaction_status == 'expire') {
            // TODO set payment status in merchant's database to 'expire'
            $transactionStatus = 'failed';
        }

        // Melakukan update untuk payment_status dan snap_token

        if ($json->payment_type)
        {
            $order->update([
                'payment_status' => $transactionStatus,
                'snap_token' => $transaction_id,
                'transaction_time' => $json->transaction_time,
                'uid' => $json->order_id,
                'payment_type' => $json->payment_type,
                'bank' => $json->va_numbers[0]->bank
            ]);
        } else
        {
            $order->update([
                'payment_status' => $transactionStatus,
                'snap_token' => $transaction_id,
                'transaction_time' => $json->transaction_time,
                'uid' => $json->order_id,
                'payment_type' => $json->payment_type
            ]);
        }

        // Redirect halaman ke index ketika telah melakukan pembayaran
        return redirect()->route('payment.success');
    }

    public function orderSuccess()
    {
        $order = Order::latest()->first();

        return view('pages.orders.order-success', compact('order'));
    }

    public function invoicepdf($order_id)
    {
        // Mengambil seluruh data dari table orders dengan melakukan join pada table user_orders dan spots
        $selectOrder = Order::join('user_orders', 'orders.user_order_id', '=', 'user_orders.id')
            ->join('spots', 'orders.spot_id', '=', 'spots.id')
            ->where('orders.id', $order_id)
            ->where('user_orders.user_id', Auth::id())
            ->select('orders.*', 'user_orders.*', 'spots.*', 'orders.id as order_id')
            ->get();

        $payment_date = Carbon::parse($selectOrder[0]->transaction_time)->format('H:i T j F Y');

        $code = $selectOrder[0]->slug.'-'.$selectOrder[0]->uid;

        $pdf = Pdf::loadView('orders.pdf', [
            'order' => $selectOrder,
            'payment_date' => $payment_date,
            'code' => $code,
        ]);

        return $pdf->download('travelien-'.$selectOrder[0]->uid.'.pdf');
        //return $pdf->stream();

        //return view('orders.pdf', [
        //    'order' => $selectOrder,
        //    'payment_date' => $payment_date
        //]);
    }
}
