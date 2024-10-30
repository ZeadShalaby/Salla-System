<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Product;

class CheckPolicy
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $productId = $request->route('product'); // Assuming the route parameter is 'product'
        $product = Product::find($productId);

        if (!$product || $product->user_id != auth()->id()) {
            return response()->json(['error' => '404', 'message' => 'Product Not Found'], 404);
        }

        return $next($request);
    }
}
