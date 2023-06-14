<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />

		<title>A simple, clean, and responsive HTML invoice template</title>

		<!-- Favicon -->
		<link rel="icon" href="./images/favicon.png" type="image/x-icon" />

		<!-- Invoice styling -->
	</head>

	<body>
		<div class="container">
        <div class="invoice-container" ref="document" id="html">
            <table style="width:100%; height:auto;  text-align:center; " BORDER=0 CELLSPACING=0>
            <thead style="background:#fafafa; padding:8px;">
                <tr style="font-size: 20px;">
                <td colspan="4" style="padding:20px 20px;text-align: left;">Travelien</td>
                </tr>
            </thead>
            <tbody style="background:#ffff;padding:20px;">
                <tr>
                <td colspan="4" style="padding:20px 0px 0px 20px;text-align:left;font-size: 16px; font-weight: bold;color:#000;">Hello, {{ $order[0]->name }}</td>
                </tr>
                <tr>
                <td colspan="4" style="text-align:left;padding:10px 0px 0px 20px;font-size:14px;">Billing to : {{ Auth::user()->email }}</td>
                </tr>
                <tr>
                <td colspan="4" style="text-align:left;padding:10px 10px 10px 20px;font-size:14px;">Your order details</td>
                </tr>
            </tbody>
            </table>
            <table style="width:100%; height:auto; background-color:#fff;text-align:center; padding:10px; background:#fafafa">
            <tbody>
                <tr style="color:#6c757d; font-size: 20px;">
                <td style="border-right:1.5px dashed  #DCDCDC; width:25%;font-size:12px;font-weight:700;padding: 0px 0px 10px 0px;">Order Date</td>
                <td style="border-right: 1.5px dashed  #DCDCDC ;width:25%;font-size:12px;font-weight:700;padding: 0px 0px 10px 0px;">Order No.</td>
                <td style="border-right:1.5px dashed  #DCDCDC ;width:25%;font-size:12px;font-weight:700;padding: 0px 0px 10px 0px;">Payment</td>
                <td style="width:25%;font-size:12px;font-weight:700;padding: 0px 0px 10px 0px;">Phone</td>
                </tr>
                <tr style="background-color:#fff; font-size:12px; color:#262626;">
                <td style="border-right:1.5px dashed  #DCDCDC ;width:25%; font-weight:bold;background: #fafafa;">{{ $payment_date }}</td>
                <td style="border-right:1.5px dashed  #DCDCDC ;width:25% ; font-weight:bold;background: #fafafa;">{{ $order[0]->uid }}</td>
                <td style="border-right:1.5px dashed  #DCDCDC ;width:25%; font-weight:bold;background: #fafafa;">
                    @if ($order[0]->payment_type == 'bank_transfer')
                        {{ 'Bank Transfer - '.strtoupper($order[0]->bank) }}
                    @else
                        {{ $order[0]->payment_type }}
                    @endif
                </td>
                <td style="width:25%; font-weight:bold;background: #fafafa;">{{ '+'.$order[0]->phone }}</td>
                </tr>
            </tbody>
            </table>
            <table style="width:100%; height:auto; background-color:#fff; margin-top:0px;  padding:20px; font-size:12px; border: 1px solid #ebebeb; border-top:0px;">
            <thead>
                <tr style=" color: #6c757d;font-weight: bold; padding: 5px;">
                <td colspan="2" style="text-align: left;">Item</td>
                <td style="text-align: center;">Price per ticket</td>
                <td style="padding: 10px;text-align:center;">Qty</td>
                <td style="text-align: right;padding: 10px;">Subtotal</td>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td colspan="2" style="text-align: left;">{{ 'Ticket to '.$order[0]->spot_name }}</td>
                    <td style="text-align: center;">{{ 'Rp. '.number_format($order[0]->ticket_price) }}</td>
                    <td style="padding: 10px;text-align:center;">{{ $order[0]->ticket_amount }}</td>
                    <td style="text-align: right;padding: 10px;">{{ 'Rp. '.number_format($order[0]->total_price) }}</td>
                </tr>
            </tbody>
            </table>
            <table style="width:100%; height:auto; background-color:#fff;padding:20px; font-size:12px; border: 1px solid #ebebeb; border-top:0">
            <tbody>
                <tr style="padding:20px;color:#000;font-size:15px">
                    <td style="font-weight: bold;padding:5px 0px">Total</td>
                    <td style="text-align:right;padding:5px 0px;font-weight: bold;font-size:16px;">{{ 'Rp. '.number_format($order[0]->total_price) }}</td>
                </tr>
            </tbody>
            <tfoot style="padding-top:20px;font-weight: bold;">
                <tr>
                    <td style="padding-top:20px;text-align:right;">{!! DNS2D::getBarcodeHTML("$code", 'QRCODE') !!}</td>
                </tr>
            </tfoot>
            </table>
        </div>
        </div>
	</body>
</html>
