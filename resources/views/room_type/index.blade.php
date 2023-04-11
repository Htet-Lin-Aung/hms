@extends('layouts.master')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
   
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Room Types
                <a href="{{ route('admin.room-type.create') }}" class="btn btn-primary float-right">Add New</a>
            </h6>
        </div>
        <div class="card-body">
            @include('common.alert')
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead class="table-primary">
                        <tr>
                            <th>#</th>
                            <th>RoomType Name</th>
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
						@foreach ($room_types as $room_type )
							<tr>
								<td>{{ $room_type->id }}</td>
								<td>{{ $room_type->name }}</td>
								<td>
									<a href="{{ route('admin.room-type.show',$room_type) }}" class="btn btn-info btn-sm"> <i class="fa fa-eye"></i></a>
									<a href="{{ route('admin.room-type.edit',$room_type) }}" class="btn btn-primary btn-sm"> <i class="fa fa-edit"></i> </a>
                                    <form action="{{ route('admin.room-type.destroy',$room_type)  }}" method="POST" class="d-unset">
                                        @method('DELETE')
                                        @csrf
                                        <button onClick="return confirm('Are you sure you want to delete?')"class="btn btn-danger btn-sm"> <i class="fa fa-trash"></i> </button>
                                    </form>
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