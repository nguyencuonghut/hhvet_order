@extends('layouts.master')

@section('title', 'Order')

@section('content')
    <form action="{{ route('order') }}" method="post">
    @foreach($products as $product)
        <div class="row">
            <div class="col-xs-7 col-sm-3 col-md-3 col-md-offset-3 col-sm-offset-3">
                <ul class="media-list">
                    <li class="media">
                        <div class="media-left">
                            <a href="#">
                                <img class="media-object" style = "width: 60px" src="{{ $product->image }}" alt="{{ $product->title }}">
                            </a>
                        </div>
                        <div class="media-body">
                            <b class="media-heading">{{ $product->title }}</b>
                            <br><br>
                            <i style="color:red">{{ number_format($product->price, 0, '.', ',') }} VNĐ</i>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="col-xs-4 col-sm-3 col-md-3 col-xs-offset-1 col-sm-offset-1 col-md-offset-1">
                <select name="{{ $product->code }}" id="{{ $product->code }}" class="form-control">
                    <?php
                        $numbers = ['0'];
                        $i = 0;
                        for($i = 1; $i < 500; $i++) {
                            $numbers[$i] = $i;
                        }
                    ?>
                    @foreach($numbers as $number)
                        <option value="{{ $number }}">{{ $number }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    @endforeach
    <hr>
    <div class="row">
        <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
            <button type="submit" class="btn btn-success btn-lg">Đặt hàng</button>
            {{ csrf_field() }}
        </div>
    </div>
    <hr>
    </form>
@endsection