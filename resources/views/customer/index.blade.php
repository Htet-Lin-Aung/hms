@extends('layouts.master')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
   
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Customers
                <a href="{{ route('admin.customer.create') }}" class="btn btn-primary float-right">Add New</a>
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
							{{-- <th>Email</th> --}}
                            <th>Phone</th>
                            <th>Address</th>
                            <th>Check In</th>
                            <th>Check Out</th>
                            @if(request()->status != 'checkout')
                            <th>To Change</th>
                            @endif
                            <th>Action</th>
                        </tr>
                    </thead>
                    <!-- <tfoot class="table-primary">
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Room Type</th>
                            <th>Room Details</th>
                            <th>Action</th>
                        </tr>
                    </tfoot> -->
                    <tbody>
						@foreach ($customers as $index=>$customer )
							<tr>
								<td>{{ $index+1 }}</td>
								<td>{{ $customer->room_id }}</td>
								<td>{{ $customer->name }}</td>
								<td>{{ $customer->nrc }}</td>
								{{-- <td>{{ $customer->email }}</td> --}}
								<td>{{ $customer->phone }}</td>
								<td>{{ $customer->address }}</td>
								<td>{{ $customer->check_in }}</td>
								<td>{{ $customer->check_out }}</td>

                                @if($customer->status != 'checkout')
                                <td>@include('customer.change_state')</td>
                                @endif
								<td>
									<a href="{{ route('admin.customer.show',$customer) }}" class="btn btn-info btn-sm"> <i class="fa fa-eye"></i></a>
									<a href="{{ route('admin.customer.edit',$customer) }}" class="btn btn-primary btn-sm"> <i class="fa fa-edit"></i> </a>
									<a onClick="return confirm('Are you sure you want to delete?')" href="{{ route('admin.customer.destroy',$customer)  }}" class="btn btn-danger btn-sm"> <i class="fa fa-trash"></i> </a>
								</td>
							</tr>
						@endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
@section('scripts')
    <!-- Page level plugins -->
    <script src="{{ asset('/vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

    <!-- Page level custom scripts -->
    <script src="{{ asset('/js/demo/datatables-demo.js') }}"></script>
@endsection

@endsection