@extends('layouts.master')

@section('title', 'Đăng ký')

@section('content')
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <h1>Đăng ký</h1>
            @if(count($errors) > 0)
            <div class="alert alert-danger">
                @foreach($errors->all() as $error)
                <p>{{ $error }}</p>
                @endforeach
            </div>
            @endif
            <form action="{{ route('user.signup') }}" method="post">
                <div class="form-group">
                    <label for="phone">Số điện thoại</label>
                    <input type="tel" id="phone" name="phone" class="form-control">
                </div>
                <div class="form-group">
                    <label for="password">Password <i>(ít nhất 6 ký tự)</i></label>
                    <input type="password" id="password" name="password" class="form-control">
                </div>
                <div class="form-group">
                    <label for="password2">Nhập lại password</label>
                    <input type="password" id="password2" name="password2" class="form-control">
                </div>
                <div class="form-group">
                    <label for="name">Họ và Tên</label>
                    <input type="text" id="name" name="name" class="form-control">
                </div>
                <button type="submit" class="btn btn-primary">Đăng ký</button>
                {{ csrf_field() }}
            </form>
        </div>
    </div>
@endsection