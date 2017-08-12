@extends('layouts.master')

@section('title', 'Edit Product')

@section('content')
    <div class="row">
        {!! Form::model($product, ['route' => ['items.update',  $product->id], 'method' => 'PUT', 'files' => true]) !!}
        <div class="col-md-8">
            {{ Form::label('image', 'Ảnh:') }}
            {{ Form::file('image', NULL, array('class' => 'form-control')) }}

            {{ Form::label('code', 'Mã SP:') }}
            {{ Form::text('code', null, ['class' => 'form-control']) }}

            {{ Form::label('title', 'Tên SP:') }}
            {{ Form::text('title', null, ['class' => 'form-control']) }}

            {{ Form::label('format', 'Quy cách:') }}
            {{ Form::text('format', null, ['class' => 'form-control']) }}

            {{ Form::label('price', 'Giá:') }}
            {{ Form::number('price', null, ['class' => 'form-control']) }}

            {{ Form::label('pro_major', '[Khuyến mại] Số lượng mua:') }}
            {{ Form::number('pro_major', null, ['class' => 'form-control']) }}

            {{ Form::label('pro_minor', '[Khuyến mại] Số lượng bán:') }}
            {{ Form::number('pro_minor', null, ['class' => 'form-control']) }}
        </div>

        <div class="col-md-4">
            <div class="well">
                <dl class="dl-horizontal">
                    <dt>Thời gian tạo:</dt>
                    <dd>{{ $product->created_at }}</dd>
                </dl>
                <dl class="dl-horizontal">
                    <dt>Thời gian sửa:</dt>
                    <dd>{{ $product->updated_at }}</dd>
                </dl>
                <hr>

                <div class="row">
                    <div class="col-sm-6">
                        {!! Html::linkRoute('items.index', 'Hủy', array($product->id), array('class' => 'btn btn-danger btn-block')) !!}
                    </div>
                    <div class="col-sm-6">
                        {{ Form::submit('Lưu', ['class' => 'btn btn-success btn-block']) }}
                        {{ csrf_field() }}
                    </div>
                </div>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
@endsection