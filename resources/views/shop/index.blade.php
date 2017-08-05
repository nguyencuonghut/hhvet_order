@extends('layouts.master')

@section('title', 'Shop index')

@section('content')
    @foreach($products->chunk(3) as $productChunk)
        <div class="row">
            @foreach($productChunk as $product)
            <div class="col-sm-6 col-md-4">
                <div class="thumbnail">
                    <img src="{{ $product->image }}" alt="..." class="img-responsive">
                    <div class="caption">
                        <h3>{{ $product->title }}</h3>
                        <p class="description">{{ mb_substr(strip_tags($product->description), 0, 120) }} {{ strlen(strip_tags($product->description)) > 120 ? '...':'' }}</p>
                        <div class="clearfix">
                            <div class="pull-left price">VNĐ {{ number_format($product->price, 0, '.', ',') }}</div>
                            <a href="#" class="btn btn-success pull-right" role="button"><i class="fa fa-cart-plus" aria-hidden="true"></i> Thêm vào giỏ</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    @endforeach
@endsection