@extends('layouts.master')

@section('title', 'Cancel Order')

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h2>Đơn hàng muốn hủy</h2>
            <div class="panel panel-success">
                <div class="panel-heading">Khách hàng: <b>{{ $order->name }}</b> | <i><b style="color:red">{{ number_format($order->cart->totalPrice, 0, '.', ',') }} VNĐ</b></i></div>
                <div class="panel-body">
                    <ul class="list-group">
                        @foreach($order->cart->items as $item)
                            @if($item['qty'])
                                <li class="list-group-item">
                                    <span class="badge">{{ $item['qty'] }}</span>
                                    <strong>{{ $item['item']['title'] }}</strong>
                                    <span class="label label-default">{{ number_format($item['item']['price'], 0, '.', ',') }} VNĐ</span>
                                </li>
                            @endif
                        @endforeach
                    </ul>
                </div>
            </div>

            <form action="" method="post">
                <div class="form-group">
                    <label for="reason">Lý do:</label>
                    <textarea name="reason" class="form-control"></textarea>
                </div>
                <button type="submit" class="btn btn-success btn-block">Hủy đơn hàng</button>
                {{ csrf_field() }}
            </form>
        </div>
    </div>
@stop