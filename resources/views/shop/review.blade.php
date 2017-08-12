@extends('layouts.master')

@section('title', 'Review order')

@section('content')
    @if($order->cart->totalPrice)
        <form action="" method="post">
        @foreach($order->cart->items as $product)
            @if($product['qty'])
                <div class="row">
                    <div class="col-xs-7 col-sm-3 col-md-3 col-md-offset-3 col-sm-offset-3">
                        <ul class="media-list">
                            <li class="media">
                                <div class="media-left">
                                    <a href="#">
                                        <img class="media-object" style = "width: 60px" src="{{ '/upload/images/' . $product['item']['image'] }}" alt="{{ $product['item']['title'] }}">
                                    </a>
                                </div>
                                <div class="media-body">
                                    <b class="media-heading">{{ $product['item']['title'] }}</b>
                                    <br><br>
                                    <i style="color:red">{{ number_format($product['item']['price'], 0, '.', ',') }} VNĐ</i>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="col-xs-4 col-sm-3 col-md-3 col-xs-offset-1 col-sm-offset-1 col-md-offset-1">
                        <select name="{{ $product['item']['code'] }}" id="{{ $product['item']['code'] }}" class="form-control">
                            <?php
                            $numbers = ['0'];
                            $i = 0;
                            for($i = 1; $i < 500; $i++) {
                                $numbers[$i] = $i;
                            }
                            ?>
                            @foreach($numbers as $number)
                                @if($number == $product['qty'])
                                <option value="{{ $number }}" selected>{{ $number }}</option>
                                @else
                                <option value="{{ $number }}">{{ $number }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                </div>
            @endif
        @endforeach
        <div class="row">
            <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
                <strong>Tổng tiền: {{ number_format($order->cart->totalPrice, 0, '.', ',') }} VNĐ</strong>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                @if(count($errors) > 0)
                    <div class="alert alert-danger">
                        @foreach($errors->all() as $error)
                            <p>{{ $error }}</p>
                        @endforeach
                    </div>
                @endif
                    <div class="form-group">
                        <label for="name">Tên khách hàng</label>
                        <input type="text" id="name" name="name" value = "{{ Auth::user()->name }}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="address">Địa chỉ giao hàng</label>
                        <input type="text" id="address" name="address" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="bill_addr">Địa chỉ hóa đơn</label>
                        <input type="text" id="bill_addr" name="bill_addr" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="contact">Người liên hệ <i style="color:red">(Ghi rõ họ tên và số điện thoại)</i></label>
                        <input type="text" id="contact" name="contact" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="note">Ghi chú</label>
                        <textarea name="note" class="form-control"></textarea>
                    </div>
                    <button type="submit" class="btn btn-success btn-block">Đặt hàng</button>
            </div>
        </div>
        {{ csrf_field() }}
        </form>
    @else
        <div class="row">
            <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
                <h2>Không có sản phẩm nào trong giỏ!</h2>
            </div>
        </div>
    @endif
@endsection