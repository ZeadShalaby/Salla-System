<?php

namespace App\Services;

use App\Models\Product;

class InfoCalculator
{
    protected array $data;

    public function __construct(array $data = [])
    {
        $this->data = $data;
    }

    // ?todo Calculate total
    public function calculate(): float
    {
        $total = 0.0;

        foreach ($this->data as $item) {
            if (isset($item['id'])) {
                $product = Product::with('discount')->find($item['id']);
                if ($product) {
                    $discount = $product->discount ? $product->discount->discount / 100 : 0;
                    $discountedPrice = $product->price;
                    if (isset($item['qty'])) {
                        $total += $discountedPrice * $item['qty'];
                    }
                }
            }
        }

        return $total;
    }

    // ?todo Calculate total with tax   //? 10% not use it
    public function calculateWithTax(): float
    {
        $total = $this->calculate();
        $taxRate = 0.1;

        return $total + ($total * $taxRate);
    }

    // ?todo Get product info
    public function productInfo()
    {
        $datas = [];

        foreach ($this->data as $item) {
            if (isset($item['id'])) {
                $product = Product::find($item['id']);
                if ($product) {
                    $datas[] = [
                        'name' => $product->name,
                        'price' => $product->price,
                        'desc' => "",
                        'qty' => $item['qty'],
                    ];
                }
            }
        }

        return $datas;
    }

    // ? handle details product
    public function detailsProduct(): mixed
    {
        $data = [];
        $data['items'] = $this->productInfo();
        $data['invoice_id'] = 1;
        $data['invoice_description'] = "Order #{$data['invoice_id']} Invoice";
        $data['return_url'] = "http://127.0.0.1:8000/api/users/payment/paypal/success";
        $data['cancel_url'] = "http://127.0.0.1:8000/api/users/payment/paypal/cancel";
        $data['total'] = $this->calculate();
        return $data;
    }
}
