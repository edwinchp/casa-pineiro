<?php

namespace App\Http\Middleware;

use Closure;
use App\Product;

class CheckProduct
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        if ($request->is('products')) {
            return $next($request);
        } else {
            $product = Product::findOrFail($request->route('product')); // products/2/edit
            $isAllowed = false;
            foreach (auth()->user()->stores->all() as $store) {
                // if product is part of any of user stores
                if ($product->store_id == $store->id) {
                    $isAllowed = true;
                }
            }
            if ($isAllowed) {
                return $next($request);
            }
        }
        return redirect()->route('products.index');
    }
}
