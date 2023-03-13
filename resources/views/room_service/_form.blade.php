@extends('layouts.master')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Room Services
                <a href="{{ route('admin.room-service.index') }}" class="btn btn-primary float-right">View All</a>
            </h6>
        </div>
        <div class="card-body">
            @include('common.alert')
            <form method="POST" action="{{ $route }}" enctype="multipart/form-data">
                @csrf
                @method($method)
                <div class="row">
                    <div class="col-md-2">
                        <label for="name">Room Service Name</label>
                    </div>
                    <div class="col-md-8">
                        <input type="text" name="name" value="{{$room_service ? $room_service->name : old('name')}}" class="form-control @error('name') is-invalid @enderror" autocomplete=off/>
                        @error('name')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col text-center">
                        <button type="submit" class="btn btn-primary">{{$btn}}</button>
                    </div>
                </div>
            </form>   
            
        </div>
    </div>
</div>
<!-- /.container-fluid -->
@endsection