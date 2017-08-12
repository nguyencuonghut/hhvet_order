@extends('layouts.master')

@section('title', 'Shop index')

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
    @foreach($products->chunk(12) as $productChunk)
        <div class="row">
            @foreach($productChunk as $product)
            <div class="col-lg-3 col-md-4 col-xs-6">
                <div class="thumbnail">
                    {{ Html::image('/upload/images/' . $product->image, $product->title, array('class' => 'img-responsive')) }}
                    <div class="caption">
                        <!-- <b style="color:red;">{{ $product->title }}</b> | <i style="color:blue">Mua {{ $product->pro_major }} tặng {{ $product->pro_minor }}</i>-->
						<i style="color:red;">{{ $product->title }}</i>

                        <br>
                        <!-- <p class="description">{{ mb_substr(strip_tags($product->description), 0, 120) }} {{ strlen(strip_tags($product->description)) > 120 ? '...':'' }}</p> -->
                        <div class="clearfix">
                            <div class="pull-left price">VNĐ {{ number_format($product->price, 0, '.', ',') }}</div>
                            <!-- <a href="{{ route('product.addToCart', ['id' => $product->id]) }}" class="btn btn-success pull-right" role="button"><i class="fa fa-cart-plus" aria-hidden="true"></i> Mua hàng</a>-->
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    @endforeach
@endsection