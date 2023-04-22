@extends('layouts.master')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
   
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Room Services
                <a href="{{ route('admin.room-service.create') }}" class="btn btn-primary float-right">Add New</a>
            </h6>
        </div>
        <div class="card-body">
            @include('common.alert')
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead class="table-primary">
                        <tr>
                            <th>#</th>
                            <th>Service Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($room_services as $index => $room_service )
                            <tr>
                                <td>{{ $index+1 }}</td>
                                <td>{{ $room_service->name }}</td>
                                <td>
                                    <!-- <a href="{{ route('admin.room-service.show',$room_service) }}" class="btn btn-info btn-sm"> <i class="fa fa-eye"></i></a> -->
                                    <a href="{{ route('admin.room-service.edit',$room_service) }}" class="btn btn-primary btn-sm"> <i class="fa fa-edit"></i> </a>
                                    <form action="{{ route('admin.room-service.destroy',$room_service)  }}" method="POST" class="d-unset">
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