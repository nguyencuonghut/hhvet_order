<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Session;
use Mail;

class UserController extends Controller
{
    public function getSignup() {
        return view('users.signup');
    }

    public function postSignup(Request $request) {
        // Validate the input
        $this->validate($request, array(
            'phone'         => 'required|numeric|unique:users',
            'password'      => 'required|min:6',
            'password2'     => 'required|min:6',
            'name'          => 'required'
        ));

        if($request->input('password') != $request->input('password2')){
            return redirect()->back()->with('error', 'Password phải khớp nhau giữa 2 lần nhập.');
        }
        //store user information to database
        $user = new User([
            'phone'             => $request->input('phone'),
            'password'          => bcrypt($request->input('password')),
            'name'              => $request->input('name'),
        ]);

        $user->save();

        Auth::login($user);

        // redirect to other page
        return redirect()->route('product.index')->with('message', 'Bạn đã đăng ký thành công!');
    }

    public function getSignin(){
        return view('users.signin');
    }

    public function postSignin(Request $request) {
        $this->validate($request, array(
            'phone'     => 'required|numeric',
            'password'  => 'required|min:6'
        ));

        if(Auth::attempt(['phone' => $request->phone, 'password' => $request->password])) {
            return redirect()->route('order');
        }
        return redirect()->back()->with('error', 'Email hoặc passsword của bạn bị sai. Vui lòng kiểm tra lại!');
    }

    public function getProfile() {
        $orders = Auth::user()->orders;
        $orders->transform(function($order, $key) {
            $order->cart = unserialize($order->cart);
            return $order;
        });
        return view('users.profile', ['orders' => $orders]);
    }

    public function getCancelorder($id) {
        // Find the order which you want to cancel
        $orders = Auth::user()->orders;
        $m_order = NULL;
        foreach ($orders as $order) {
            if($id == $order->id) {
                $m_order = $order;
            }
        }
        $m_order->cart = unserialize($m_order->cart);
        return view('shop.cancel', ['order' => $m_order]);
    }

    public function postCancelorder(Request $request, $id) {
        // Validate the input
        $this->validate($request, [
            'reason'    => 'required'
        ]);

        // Store the  reason and change the state of order
        $orders = Auth::user()->orders;
        $m_order = NULL;
        foreach ($orders as $order) {
            if($id == $order->id) {
                $m_order = $order;
            }
        }
        $m_order->reason = $request->input('reason');
        $m_order->active = false;
        Auth::user()->orders()->save($order);


        $m_order->cart = unserialize($m_order->cart);
        // Send email to Sale Admin
        $mailer = app()->make('mailer');
        $data = array('customer' => $m_order->name);
        $mailer->send('shop.cancelform', ['order' => $m_order] , function ($message) use ($data){
            $message->from('luong_thuoc@honghafeed.com.vn', 'HHVET Order System');
            $message->to('nguyenvancuong@honghafeed.com.vn')
                ->cc('nguyencuonghut55@gmail.com')
                ->subject('Hủy đơn đặt hàng thuốc cho đại lý:' . ' ' . $data['customer']);
        });

        // Set the flash message
        Session::flash('success', 'Hủy thành công!');

        return redirect()->route('user.profile');
    }

    public function getLogout() {
        Auth::logout();
        return redirect()->back()->with('mesage', 'Bạn đã đăng xuất thành công!');
    }
}
