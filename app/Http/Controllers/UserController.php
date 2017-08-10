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
            'email'     => 'required|email|unique:users',
            'password'  => 'required|min:6'
        ));

        //store user information to database
        $user = new User([
            'email'     => $request->email,
            'password'  => bcrypt($request->password)
        ]);

        $user->save();

        Auth::login($user);

        // redirect to other page
        return redirect()->route('user.profile');
    }

    public function getSignin(){
        return view('users.signin');
    }

    public function postSignin(Request $request) {
        $this->validate($request, array(
            'email'     => 'email|required',
            'password'  => 'required|min:6'
        ));

        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->route('user.profile')->with('message', 'Bạn đã đăng nhập thành công!');
        }
        return redirect()->back();
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
