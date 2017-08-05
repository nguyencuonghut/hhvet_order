<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Session;
use App\Cart;

class ProductController extends Controller
{
    public function getIndex() {
        $products = Product::all();

        return view('shop.index')->withProducts($products);
    }

    public function getAddToCart(Request $request, $id) {
        $product = Product::find($id);

        $oldCart = Session::has('cart') ? Session::get('cart') : NULL;
        $cart = new Cart($oldCart);
        $cart->add($product, $product->id);

        $request->session()->put('cart', $cart);

        //dd($request->session()->get('cart', $cart));
        return redirect()->route('product.index');
    }

    public function getCart() {
        if(!Session::has('cart')) {
            return view('shop.shopping-cart', ['products' => NULL]);
        }

        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);

        return view('shop.shopping-cart', ['products' => $cart->items, 'totalPrice' => $cart->totalPrice]);
    }
}
