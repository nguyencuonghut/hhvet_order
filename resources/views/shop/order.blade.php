@extends('layouts.master')

@section('title', 'Order')

@section('content')
    @if(Session::has('cart'))
        @foreach($products as $product)
            <div class="row">
                <div class="col-sm-1 col-md-1 col-md-offset-3 col-sm-offset-3">
                        <label for="email">{{ $product->code }}</label>
                </div>
                <div class="col-sm-2 col-md-2">
                    <label for="email">{{ $product->title }}</label>
                </div>
                <div class="col-sm-1 col-md-1">
                        <label for="email">{{ $product->price }} VNĐ</label>
                </div>
                <div class="col-sm-1 col-md-1">
                    <ul class="list-group">
                        <input type="number" id="" name="email" class="form-control input-md">
                    </ul>
                </div>
            </div>
        @endforeach
        <div class="row">
            <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
                <strong>Tổng tiền: {{ number_format('100000000', 0, '.', ',') }} VNĐ</strong>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
                <a href="{{ route('checkout')}}" type="button" class="btn btn-success">Đặt hàng</a>
            </div>
        </div>
    @else
        <div class="row">
            <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
                <h2>Không có sản phẩm nào trong giỏ Cart!</h2>
            </div>
        </div>
    @endif
@endsection