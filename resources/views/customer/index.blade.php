@extends('layouts.master')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
   
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary text-uppercase">{{request()->status}}
            </h6>
        </div>
        <div class="card-body">
            @include('common.alert')
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead class="table-primary">
                        <tr>
                            <th>#</th>
                            <th>Room Name</th>
                            <th>Customer Name</th>
							<th>NRC</th>
                            <th>Phone</th>
                            <th>Check In</th>
                            <th>Check Out</th>
                            @if(request()->status != 'checkout')
                            <th>To Change</th>
                            @endif
                            <th>Payment</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
						@foreach ($customers as $index=>$customer )
							<tr>
								<td>{{ $index+1 }}</td>
								<td>{{ $customer->room_id }}</td>
								<td>{{ $customer->name }}</td>
								<td>{{ $customer->nrc }}</td>
								<td>{{ $customer->phone }}</td>
								<td>{{ $customer->check_in }}</td>
								<td>{{ $customer->check_out }}</td>

                                @if($customer->status != 'checkout')
                                <td>@include('customer.change_state')</td>
                                @endif
                                <td>
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal{{$customer->id}}">
                                        Payment
                                    </button>
                                    @include('customer.payment')
                                </td>
								<td>
									<a href="{{ route('admin.customer.show',$customer) }}" class="btn btn-info btn-sm"> <i class="fa fa-eye"></i></a>
                                    @if(request()->status != 'checkout')
									<a href="{{ route('admin.customer.edit',$customer) }}" class="btn btn-primary btn-sm"> <i class="fa fa-edit"></i> </a>

									<a onClick="return confirm('Are you sure you want to delete?')" href="{{ route('admin.customer.destroy',$customer)  }}" class="btn btn-danger btn-sm"> <i class="fa fa-trash"></i> </a>
                                    @endif
								</td>
							</tr>
						@endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@include('common.datatable-js')
@endsection