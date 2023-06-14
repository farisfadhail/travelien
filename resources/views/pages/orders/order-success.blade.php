<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Travelien</title>
        <link rel="icon" href="../../../images/logo.svg">
        @vite('resources/css/app.css')
    </head>
    <body>
        <div class="flex justify-center h-screen">
            <div class="my-auto">
                <img src="../../images/successful-order.svg" alt="">
                <div class="text-center text-base font-semibold text-gray-700">
                    Selamat Anda telah menjadi bagian dari Travely! <br>
                    Silahkan melanjutkan ke tahap selanjutnya.
                </div>
                <a href="{{ route('user.order.payment-page', $order->id) }}" class=" mt-8 flex justify-center mx-auto rounded-full px-4 py-2 text-white bg-blue-500 hover:bg-blue-600 duration-300">
                    Melanjutkan ke pembayaran
                </a>
                <a href="{{ route('spot.index') }}" class=" mt-4 flex justify-center mx-auto rounded-full px-4 py-2 bg-white duration-300">
                    Kembali memilih tempat wisata
                </a>
            </div>
        </div>
    </body>
</html>
