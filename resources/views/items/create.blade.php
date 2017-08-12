@extends('layouts.master')

@section('title', 'Create Product')

@section('content')

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
    @if ($message = Session::get('success'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('success') }}
        </div>
    @endif

    @if ($message = Session::get('error'))
        <div class="alert alert-danger" role="alert">
            {{ Session::get('error') }}
        </div>
    @endif
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                 {{ Form::open(array('route' => 'items.store', 'files' => true)) }}
                    <div class="form-group">
                        <label for="code">Mã SP</label>
                        <input type="text" id="code" name="code" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="title">Tên SP</label>
                        <input type="text" id="title" name="title" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="image">Ảnh SP</label>
                        <input type="file" name="image" id="image" required>
                    </div>
                    <div class="form-group">
                        <label for="format">Quy cách</label>
                        <input type="text" id="format" name="format" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="price">Giá SP</label>
                        <input type="number" id="price" name="price" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="pro_major">[Khuyến mại] Số lượng mua</label>
                        <input type="number" id="pro_major" name="pro_major" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="pro_minor">[Khuyến mại] Số lượng KM</label>
                        <input type="number" id="pro_minor" name="pro_minor" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-primary">Tạo mới</button>
                    {{ csrf_field() }}
                 {{ Form::close() }}
            </div>
        </div>
@endsection