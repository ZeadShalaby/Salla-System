<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Traits\ResponseTrait;
use App\Services\InfoCalculator;
use App\Http\Controllers\Controller;
use Srmklive\PayPal\Services\ExpressCheckout;

class PayPalController extends Controller
{

    use ResponseTrait;

    // ?todo Paypal Method 
    public function paypal(Request $request)
    {
        //? Ensure items are present in the request
        $items = $request->data ?? [];
        //? Create an instance of PriceCalculator with the items
        $priceCalculator = new InfoCalculator($items);
        $data = $priceCalculator->detailsProduct();
        $provider = new ExpressCheckout;
        $response = $provider->setExpressCheckout($data, true);
        return $this->returnData('linkPyPal', $response['paypal_link']);
    }


    /**
     * todo Cancel Operation */
    public function cancel()
    {
        return $this->returnError(402, 'Payment Cancelled');
    }


    /**
     * todo Success Operation */
    public function success(Request $request)
    {
        $provider = new ExpressCheckout;
        $response = $provider->getExpressCheckoutDetails($request->token);
        if (in_array($response['ACK'], ['Success', 'SuccessWithWarning'])) {
            /**
             * todo Success Operation */
            return $this->returnSuccessMessage('Payment Success', 200);
        }

        /** 
         * todo Cancel Operation */
        return response()->json('Payment Cancelled', 402);
    }
}
