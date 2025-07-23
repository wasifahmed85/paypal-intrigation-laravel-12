<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\FuncCall;
use Srmklive\PayPal\Services\PayPal as PayPalClient;


class ProductController extends Controller
{
    public function index(Request $request)
    {
        $data['products']=Product::get();
        return view('products.index',$data);
    }
    public function paypalPaymentLink($id)
    {
        $data['product']=Product::findOrFail($id);
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $provider->getAccessToken();
        $data = [
            "intent" => "CAPTURE",
            "application_context" => [
                'return_url' => route('paypal.paymentSuccess'),
                'cancel_url' => route('paypal.paymentCancel')
            ],
            "purchase_units" => [
                [
                    "amount" => [
                        "currency_code" => "USD",
                        "value" => $data['product']->price
                    ]
                ]
            ]
        ];
        $order = $provider->createOrder($data);

        $url = collect($order['links'])->Where('rel', 'approve')->first()['href'];

        
        return redirect()->away($url);
    }


    public function paypalPaymentSuccess(Request $request)
    {

         $token = $request->token;
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $provider->getAccessToken();

        $order = $provider->capturePaymentOrder($token);
        

        if (isset($order['status']) && $order['status'] == 'COMPLETED') {
          
            return view('products.success');
        }
       return redirect(route('products.paymentCancel'));
    }

    public function paypalPaymentCancel(Request $request)
    {
        return view('products.cancel');
    }
}
