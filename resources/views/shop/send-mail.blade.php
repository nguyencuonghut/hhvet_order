@extends('layouts.master')

@section('title', 'Send Email')

@section('content')
    <div class="row">
        <div class="container">
            <div class="col-md-4 col-md-offset-4">
                <h1 style="text-align: center;">Form đặt hàng</h1>
                @if(count($errors) > 0)
                    <div class="alert alert-danger">
                        @foreach($errors->all() as $error)
                            <p>{{ $error }}</p>
                        @endforeach
                    </div>
                @endif
                <form action="{{ route('sendmail', $id) }}" method="post">
                    <div class="form-group">
                        <label for="name">Tên khách hàng</label>
                        <input type="text" id="name" name="name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="address">Địa chỉ giao hàng</label>
                        <input type="address" id="address" name="address" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="bill_addr">Địa chỉ hóa đơn</label>
                        <input type="bill_addr" id="bill_addr" name="bill_addr" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="contact">Người liên hệ</label>
                        <input type="contact" id="contact" name="contact" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-success btn-block">Gửi</button>
                    {{ csrf_field() }}
                </form>
            </div>
        </div>
    </div>

@endsection