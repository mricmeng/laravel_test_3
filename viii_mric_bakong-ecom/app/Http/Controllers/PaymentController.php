<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use KHQR\BakongKHQR;
use KHQR\Helpers\KHQRData;
use KHQR\Models\IndividualInfo;


class PaymentController extends Controller
{
    public function checkout($id)
    {

        $product = Product::findOrFail($id);

        $merchant = new IndividualInfo(
            bakongAccountID: 'cocobank@bkrt',
            merchantName: 'Meng Chomraoen',
            merchantCity: 'Phnom Penh',
            // currency: KHQRData::CURRENCY_KHR,
            currency: KHQRData::CURRENCY_USD,
            amount: $product->price
        );

        $qrResponse = BakongKHQR::generateIndividual($merchant);

        return view('products.checkout', [
            'product' => $product,
            'qr' => $qrResponse->data['qr'] ?? null,
            'md5' => $qrResponse->data['md5'] ?? null,
        ]);
    }

    public function verifyForm(){
        return view('payments.verify');
    }

    public function verifyTransaction(Request $request){

        $request->validate([
            'md5' => 'required|string'
        ]);

        try{
            $token = env('BAKONG_TOKEN');

            $bakong = new BakongKHQR($token);
            $result = $bakong->checkTransactionByMD5($request->md5);

            return response()->json($result);

        }catch(\Exception $e){

            return response()->json([
                'error' => $e->getMessage()
            ],500);

        }
    }

    public function paymentResult(){
        return view('payments.result');
    }
}
