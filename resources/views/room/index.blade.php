@extends('layouts.master')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
   
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Rooms
                <a href="{{ route('admin.room.create') }}" class="btn btn-primary float-right">Add New</a>
            </h6>
        </div>
        <div class="card-body">
            @include('common.alert')
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead class="table-primary">
                        <tr>
                            <th>#</th>
                            <th>Room No./Name</th>
							<th>Price</th>
							<th>People</th>
                            <th>Room Type</th>
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
						@foreach ($rooms as $room )
							<tr>
								<td>{{ $room->id }}</td>
								<td>{{ $room->room_no }}</td>
								<td>{{ $room->price }}</td>
								<td>{{ $room->people }}</td>
								<td>{{ $room->roomType->name }}</td>
								<td>
									<a href="{{ route('admin.room.show',$room) }}" class="btn btn-info btn-sm"> <i class="fa fa-eye"></i></a>
									<a href="{{ route('admin.room.edit',$room) }}" class="btn btn-primary btn-sm"> <i class="fa fa-edit"></i> </a>
									<a onClick="return confirm('Are you sure you want to delete?')" href="{{ route('admin.room.destroy',$room)  }}" class="btn btn-danger btn-sm"> <i class="fa fa-trash"></i> </a>
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