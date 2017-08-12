@extends('layouts.master')

@section('title', 'All Products')

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
        <div class="col-md-2 col-md-offset-10">
            <h4><a href="{{ route('items.create') }}" ><i class="fa fa-plus-circle" aria-hidden="true"></i> Thêm mới</a></h4>
        </div>

        </div>
        <div class="col-md-12">
            <table class="table">
                <thead>
                <th>Ảnh</th>
                <th>Mã SP</th>
                <th>Tên</th>
                <th>Quy cách</th>
                <th>Giá</th>
                <th>Khuyến mại</th>
                <th></th>
                </thead>

                <tbody>
                @foreach($products as $product)
                    <tr>
                        <td><img src="{{ asset('upload/images/' . $product->image) }}" alt="{{ $product->title }}" height="120" width="120"></td>
                        <th>{{ $product->code }}</th>
                        <td>{{ $product->title}}</td>
                        <td>{{ $product->format}}</td>
                        <td>{{ number_format($product->price, 0, '.', ',')}} VNĐ</td>
                        <td>Mua {{ $product->pro_major}} tặng {{ $product->pro_minor }}</td>
                        <td>
                            {!! Html::linkRoute('items.edit', 'Sửa', array($product->id), array('class' => 'btn btn-primary')) !!}
                        </td>
                        <td>
                            {!! Form::open(['route' => ['items.destroy', $product->id], 'method' => 'DELETE']) !!}

                            {{ Form::submit('Xóa', ['class' => 'btn btn-danger']) }}

                            {!! Form::close() !!}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="text-center">
                {!! $products->links() !!}
            </div>
        </div>
    </div>
@endsection