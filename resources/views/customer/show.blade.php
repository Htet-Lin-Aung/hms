@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Detail Customer
                        <a href="{{ route('admin.customer.index') }}" class="btn btn-primary float-right">View All</a>
                    </h6>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table class="table table-bordered" cellspacing="0">
                        <tr>
                            <th>Room Name</th>
                            <td>{{$customer->room->room_no}}</td>
                        </tr>
                        <tr>
                            <th>Customer Name</th>
                            <td>{{$customer->name}} MMK</td>
                        </tr>
                        <tr>
                            <th>NRC</th>
                            <td>{{ $customer->nrc }}</td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td>{{ $customer->email }}</td>
                        </tr>
                        <tr>
                            <th>Phone</th>
                            <td>{{ $customer->phone }}</td>
                        </tr>
                        <tr>
                            <th>Address</th>
                            <td>{{ $customer->address }}</td>
                        </tr>
                        <tr>
                            <th>Check In</th>
                            <td>{{ $customer->check_in }}</td>
                        </tr>
                        <tr>
                            <th>Check Out</th>
                            <td>{{ $customer->check_out }}</td>
                        </tr>
                    </table>
                   
                    <div class="row justify-content-center">
                    @foreach($customer->getMedia('images') as $image)
                        <img src="{{$image->getUrl()}}" / width="25%" class="mr-3 mt-3">
                    @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection