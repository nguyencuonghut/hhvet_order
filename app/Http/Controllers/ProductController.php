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

    public function getCheckout() {
        if(!Session::has('cart')) {
            return view('shop.shopping-cart');
        }

        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        $total = $cart->totalPrice;

        return view('shop.checkout', ['total' => $total]);
    }

    public function postCheckOut(Request $request)
    {
        if (!Session::has('cart')) {
            return redirect()->route('shop.shopping-cart');
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);

        return redirect()->route('product.index')
            ->with('success','Đặt hàng thành công');
    }

    public function getOrder() {
        $products = Product::all();
        return view('shop.order', ['products' => $products]);
    }

    public function postOrder(Request $request) {
        $products = Product::all();
        $oldCart = NULL;
        $cart = new Cart($oldCart);
        foreach ($products as $product) {
            $storedItem = ['qty' => 0, 'price' => $product->price, 'item' => $product];
            $storedItem['qty'] = $request->input($product->code);
            $storedItem['price'] = $product->price * $storedItem['qty'];
            $cart->items[$product->code] = $storedItem;
            $cart->totalQty += $request->input($product->code);
            $cart->totalPrice += $storedItem['price'];
        }
        $request->session()->put('order', $cart->totalQty);

        return view('shop.review', ['products' => $cart->items, 'totalPrice' => $cart->totalPrice]);
    }

    public function getReview(Request $request) {
        $products = Product::all();
        $oldCart = NULL;
        $cart = new Cart($oldCart);

        foreach ($products as $product) {
            $storedItem = ['qty' => 0, 'price' => $product->price, 'item' => $product];
            $storedItem['qty'] = $request->input($product->code);
            $storedItem['price'] = $product->price * $storedItem['qty'];
            $cart->items[$request->id] = $storedItem;
            $cart->totalQty++;
            $cart->totalPrice += $product->price;
        }

        return view('shop.shopping-cart', ['products' => $cart->items, 'totalPrice' => $cart->totalPrice]);
    }
}
