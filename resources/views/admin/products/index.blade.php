@extends('layouts.admin')


@section('content')
    <div class="row">
        <div class="col-md-12">
            @if (session('message'))
                <h2 class="alert alert-success">{{ session('message') }}</h2>
            @endif
            <div class="card">
                <div class="card-header">
                    <h3>Products
                        <a href="{{ url('admin/products/create') }}" class="btn btn-primary btn-sm float-end">Add Product</a>
                    </h3>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Category</th>
                                <th scope="col">Product</th>
                                <th scope="col">Price</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse  ($products as $product)
                                <tr>

                                    <td>{{ $product->id }}</td>
                                    <td>
                                        @if ($product->category)
                                        {{ $product->category->name }}
                                        @else
                                        No Category
                                        @endif
                                    </td>
                                    <td>{{ $product->name }}</td>

                                    <td>{{ $product->selling_price }}</td>
                                    <td>{{ $product->quantity }}</td>

                                    <td>{{ $product->status == '1' ? 'Hidden' : 'Visible' }}</td>
                                    <td>
                                        <a href="{{ url('admin/products/' . $product->id . '/edit') }}"class="btn btn-success">Edit</a>
                                        <a href="{{ url('admin/products/' . $product->id . '/delete') }}" onclick="return confirm('Are you want to deleted this data?')" class="btn btn-danger">Delete</a>

                                    </td>

                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5">No Brands Found</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
