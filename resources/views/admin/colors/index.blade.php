@extends('layouts.admin')


@section('content')
    <div class="row">
        <div class="col-md-12">
            @if (session('message'))
                <h2 class="alert alert-success">{{ session('message') }}</h2>
            @endif
            <div class="card">
                <div class="card-header">
                    <h3>Colors List
                        <a href="{{ url('admin/color/create') }}" class="btn btn-primary btn-sm float-end">Add Colors</a>
                    </h3>
                </div>
                <div class="card-body">
                </div>
            </div>
        </div>
    </div>
@endsection
