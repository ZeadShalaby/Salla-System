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

    // ?todo return all product
    public function index(Request $request)
    {
        try {
            $products = Product::with('category', 'user', 'discount')->get();
            return $this->returnSuccessMessage($products, "S000");
        } catch (Exception $e) {
            return $this->returnError('500', "Server Error . , " . $e->getCode() . " , " . $e->getMessage());
        }
    }

    // ?todo return one product
    public function show(Product $product)
    {
        try {
            return $this->returnSuccessMessage($product, "S000");
        } catch (Exception $e) {
            return $this->returnError('500', "Server Error . , " . $e->getCode() . " , " . $e->getMessage());
        }
    }

    // ?todo create new product
    public function store(Request $request)
    {
        try {
            $product = Product::create($request->all());
            return $this->returnSuccessMessage("Create Product Success", "S000");
        } catch (Exception $e) {
            return $this->returnError('500', "Server Error . , " . $e->getCode() . " , " . $e->getMessage());
        }
    }

    // ?todo edit return info for product
    public function edit(Product $product)
    {
        try {
            return $this->returnSuccessMessage($product, "S000");
        } catch (Exception $e) {
            return $this->returnError('500', "Server Error . , " . $e->getCode() . " , " . $e->getMessage());
        }
    }

    // ?todo update info for product
    public function update(Request $request, Product $product)
    {
        try {
            $product->update($request->all());
            return $this->returnSuccessMessage($product, "U000");
        } catch (Exception $e) {
            return $this->returnError('500', "Server Error . , " . $e->getCode() . " , " . $e->getMessage());
        }
    }


    // ?todo delete product   // softDelete //
    public function destroy(Product $product)
    {
        try {
            $product->delete();
            return $this->returnSuccessMessage("Delete Success", "D000");
        } catch (Exception $e) {
            return $this->returnError('500', "Server Error . , " . $e->getCode() . " , " . $e->getMessage());
        }
    }

    // ?todo delete product   // forceDelete // 
    public function deleteForce(Product $product)
    {
        try {
            $product->forceDelete();
            return $this->returnSuccessMessage("Delete Force Success", "D000");
        } catch (Exception $e) {
            return $this->returnError('500', "Server Error . , " . $e->getCode() . " , " . $e->getMessage());
        }
    }

    // ?todo search product by name || price
    public function AutoComplete(Request $request)
    {
        try {
            $resultSearch = Product::whereAny(['name', 'price'], 'like', '%' . $request->search . '%')->get();
            return $this->returnSuccessMessage($resultSearch, "S000");
        } catch (Exception $e) {
            return $this->returnError('500', "Server Error . , " . $e->getCode() . " , " . $e->getMessage());
        }
    }

}
