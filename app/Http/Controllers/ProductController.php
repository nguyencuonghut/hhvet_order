<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Session;
use App\Cart;
use App\Order;
use Auth;
use Mail;

class ProductController extends Controller
{
    public function getIndex() {
        Session::forget('order');
        $products = Product::all();

        return view('shop.index')->withProducts($products);
    }

    public function getAddToCart(Request $request, $id) {
        $product = Product::find($id);

        $oldCart = Session::has('cart') ? Session::get('cart') : NULL;
        $cart = new Cart($oldCart);
        $cart->add($product, $product->id);

        $request->session()->put('cart', $cart);

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
        Session::forget('order');
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

        // store order to database
        $order =  new Order();
        $order->cart = serialize($cart);
        Auth::user()->orders()->save($order);

        return redirect()->route('review', ['id' => $order->id]);
    }

    public function getReview($id) {
        $orders = Auth::user()->orders;
        $orders->transform(function($order,$key) {
            $order->cart = unserialize($order->cart);
            return $order;
        });

        $m_order = NULL;
        foreach ($orders as $order) {
            if($id == $order->id) {
                $m_order = $order;
            }
        }
        return view('shop.review', ['order' => $m_order]);
    }

    public function postReview(Request $request, $id) {
        // validate input
        $this->validate($request, [
            'name'      => 'required',
            'address'   => 'required',
            'bill_addr' => 'required',
            'contact'   => 'required'
        ]);

        // Store input to database
        $orders = Auth::user()->orders;

        $m_order = NULL;
        foreach ($orders as $order) {
            if($id == $order->id) {
                $m_order = $order;
            }
        }
        $m_order->name      = $request->input('name');
        $m_order->address   = $request->input('address');
        $m_order->bill_addr = $request->input('bill_addr');
        $m_order->contact   = $request->input('contact');
        $m_order->note   = $request->input('note');
        Auth::user()->orders()->save($m_order);

        // Send email to Sale Admin
        $m_order->cart = unserialize($m_order->cart);
        $mailer = app()->make('mailer');


        $data = array('customer' => $m_order->name);
        $mailer->send('shop.bookingform', ['order' => $m_order] , function ($message) use ($data){
            $message->from('luong_thuoc@honghafeed.com.vn', 'HHVET Order System');
            $message->to('nguyenvancuong@honghafeed.com.vn')
                ->subject('Đơn đặt hàng thuốc cho đại lý:' . ' ' . $data['customer']);
        });

        // Set the flash message
        Session::flash('success', 'Đặt hàng thành công!');

        return redirect()->route('product.index');
    }

    public function getSendmail($id) {
        return view('shop.send-mail', ['id' => $id]);
    }
}
