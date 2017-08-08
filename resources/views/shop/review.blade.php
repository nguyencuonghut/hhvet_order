@extends('layouts.master')

@section('title', 'Review order')

@section('content')
    @if($totalPrice)
        <div class="row">
            <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
                <ul class="list-group">
                    @foreach($products as $product)
                        @if($product['qty'])
                            <li class="list-group-item">
                                <span class="badge">{{ $product['qty'] }}</span>
                                <strong>{{ $product['item']['title'] }}</strong>
                                <span class="label label-success">{{ number_format($product['item']['price'], 0, '.', ',') }}</span>
                            </li>
                        @endif
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
                <strong>Tổng tiền: {{ number_format($totalPrice, 0, '.', ',') }} VNĐ</strong>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-xs-6 col-sm-6 col-md-6 col-md-offset-5 col-sm-offset-5">
                <a href="{{ route('checkout')}}" type="button" class="btn btn-success btn-lg">Gửi mail đặt hàng</a>
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