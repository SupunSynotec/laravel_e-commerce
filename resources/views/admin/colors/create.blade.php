@extends('layouts.admin')


@section('content')
    <div class="row">
        <div class="col-md-12">
            @if (session('message'))
                <h2 class="alert alert-success">{{ session('message') }}</h2>
            @endif
            <div class="card">
                <div class="card-header">
                    <h3>Add Colors
                        <a href="{{ url('admin/color') }}" class="btn btn-primary btn-sm float-end">Back</a>
                    </h3>
                </div>
                <div class="card-body">
                    <form action="" method="post">
                        <div class="mb-3">
                            <label for="">Color Name</label>
                            <input type="text" name="name" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="">Color Code</label>
                            <input type="text" name="code" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="">Status</label>
                            <input type="checkbox" name="name" style="width:50px;height:50px;">
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary float-end">Save</button>

                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
    </div>
@endsection
