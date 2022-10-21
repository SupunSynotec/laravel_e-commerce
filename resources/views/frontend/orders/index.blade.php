@extends('layouts.app')

@section('title', 'My Orders')


@section('content')


    <div class="py-3 pyt-md-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="p-3 shadow bg-white">
                        <h4 class="mb-4">
                            My Orders

                        </h4>
                        <hr>
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">Order Id</th>
                                        <th scope="col">Tracking No</th>
                                        <th scope="col">User Name</th>
                                        <th scope="col">Payment Mode</th>
                                        <th scope="col">Order Date</th>
                                        <th scope="col">Status Message</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($orders as $order)
                                        <tr>
                                            <td>{{ $order->id }}</td>
                                            <td>{{ $order->tracking_no }}</td>
                                            <td>{{ $order->fullname }}</td>
                                            <td>{{ $order->payment_mode }}</td>
                                            <td>{{ $order->created_at->format('d-m-y') }}</td>
                                            <td>{{ $order->status_message }}</td>

                                            <td><a href="{{ url('orders/' . $order->id) }}"
                                                    class="btn btn-primary btn-sm">View</a></td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="7">No Orders Available</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                            <div>
                                {{ $orders->links() }}
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>


@endsection
