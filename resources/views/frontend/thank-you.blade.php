@extends('layouts.app')

@section('title', 'Thank You For Shopping')


@section('content')


    <div class="py-3 pyt-md-4">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    @if (session('message'))
                        <h5 class="alert alert-success">{{ session('message') }}</h5>
                    @endif
                    <div class="p-4 shadow bg-white">
                        <h2>You Logo</h2>
                        <h4>Thank you for shopping</h4>
                        <a href="{{ url('/collecton') }}" class="btn btn-warning">shop now</a>
                    </div>

                </div>
            </div>
        </div>
    </div>


@endsection
