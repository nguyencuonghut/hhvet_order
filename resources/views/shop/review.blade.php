@extends('layouts.master')

@section('title', 'Review order')

@section('content')
    @if($order->cart->totalPrice)
        <div class="row">
            <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
                <ul class="list-group">
                    @foreach($order->cart->items as $item)
                        @if($item['qty'])
                            <li class="list-group-item">
                                <span class="badge">{{ $item['qty'] }}</span>
                                <strong>{{ $item['item']['title'] }}</strong>
                                <span class="label label-primary">{{ number_format($item['item']['price'], 0, '.', ',') }} VNĐ</span>
                            </li>
                        @endif
                    @endforeach
                </ul>
            </div>
        </div>
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
                <form action="" method="post">
                    <div class="form-group">
                        <label for="name">Tên khách hàng</label>
                        <input type="text" id="name" name="name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="address">Địa chỉ giao hàng</label>
                        <input type="text" id="address" name="address" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="bill_addr">Địa chỉ hóa đơn</label>
                        <input type="text" id="bill_addr" name="bill_addr" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="contact">Người liên hệ</label>
                        <input type="text" id="contact" name="contact" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="note">Ghi chú</label>
                        <textarea name="note" class="form-control"></textarea>
                    </div>
                    <button type="submit" class="btn btn-success btn-block">Đặt hàng</button>
                    {{ csrf_field() }}
                </form>
            </div>
        </div>
    @else
        <div class="row">
            <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
                <h2>Không có sản phẩm nào trong giỏ!</h2>
            </div>
        </div>
    @endif
@endsection