@extends('layouts.master')

@section('title', 'Checkout')

@section('content')
    <div class="row">
        <div class="col-sm-6 col-md-4 col-md-offset-4 col-sm-offset-3">
            <h1 class="title-page">Đặt hàng</h1>
            <h4>Tổng tiền: <b style="color:red;">{{ number_format($total, 0, '.', ',')}}</b> VNĐ</h4>
            <div class="charge-error"
                 class="alert alert-danger {{ !Session::has('error') ? 'hidden': '' }}">
                {{Session::get('error')}}
            </div>
            <form  action="{{route('checkout')}}" method="post" id="checkout-form">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="form-group">
                            <label for="name">Họ và tên</label>
                            <input type="text" id="name" class="form-control" required name="name">
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <div class="form-group">
                            <label for="address">Địa chỉ</label>
                            <input type="text" id="address" class="form-control" required name="address">
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <div class="form-group">
                            <label for="card-name">Số điện thoại</label>
                            <input type="text" id="card-name" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <div class="form-group">
                            <label for="card-number">Email</label>
                            <input type="text" id="card-number" class="form-control" required>
                        </div>
                    </div>
                </div>
                {{csrf_field()}}
                <button type="submit" class="btn btn-success">Đặt hàng</button>
            </form>
        </div>
    </div>
@endsection
