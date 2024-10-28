<?php

namespace App\Http\Controllers\Api;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Traits\ResponseTrait;
use App\Http\Controllers\Controller;
use Exception;

class ProductController extends Controller
{

    use ResponseTrait;

    public function index(Request $request)
    {
        try {
            $products = Product::with('category', 'user', 'discount')->get();
            return $this->returnSuccessMessage($products, "S000");
        } catch (Exception $e) {
            return $this->returnError('500', "Server Error . , " . $e->getCode() . " , " . $e->getMessage());
        }
    }

    public function show(Product $product)
    {
        try {
            return $this->returnSuccessMessage($product, "S000");
        } catch (Exception $e) {
            return $this->returnError('500', "Server Error . , " . $e->getCode() . " , " . $e->getMessage());
        }
    }

}
