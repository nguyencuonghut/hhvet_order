@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            @if ($message = Session::get('message'))
                <div class="alert alert-success" role="alert">
                    {{ Session::get('message') }}
                </div>
            @endif

            @if ($message = Session::get('error'))
                <div class="alert alert-danger" role="alert">
                    {{ Session::get('error') }}
                </div>
            @endif
            <h2>Đơn hàng của tôi</h2>
            @foreach($orders->reverse() as $order)
                @if($order->active)
                    <div class="panel panel-success">
                        <div class="panel-heading">Ngày {{ $order->created_at }} | Khách hàng: <b>{{ $order->name }}</b> | <i><b style="color:red">{{ number_format($order->cart->totalPrice, 0, '.', ',') }} VNĐ</b></i></div>
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
                        <td><a href="{{ route('cancel', $order->id) }}" class="btn btn-warning btn-block" style="align-content: center">Hủy đơn hàng</a></td>
                        <br>
                    </div>

                    <hr>
                @endif
            @endforeach
        </div>
    </div>
@stop