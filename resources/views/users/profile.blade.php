@extends('layouts.master')

@section('title', 'User Profile')

@section('content')
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            @if (session('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
            @endif
            <h1>User profile</h1>
        </div>
    </div>
@endsection