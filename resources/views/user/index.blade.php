@extends('layouts.master')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
   
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Users
                <a href="{{ route('admin.user.create') }}" class="btn btn-primary float-right">Add New</a>
            </h6>
        </div>
        <div class="card-body">
            @include('common.alert')
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead class="table-primary">
                        <tr>
                            <th>No.</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
						@foreach ($users as $user )
							<tr>
								<td>{{ $user->id }}</td>
								<td>{{ $user->name }}</td>
								<td>{{ $user->email }}</td>
								<td>{{ $user->roles[0]->name }}</td>
								<td>
									<a href="{{ route('admin.user.show',$user) }}" class="btn btn-info btn-sm"> <i class="fa fa-eye"></i></a>
									<a href="{{ route('admin.user.edit',$user) }}" class="btn btn-primary btn-sm"> <i class="fa fa-edit"></i> </a>
									<form action="{{ route('admin.user.destroy',$user)  }}" method="POST" class="d-unset">
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