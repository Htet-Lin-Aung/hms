@extends('layouts.master')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Room Types
                <a href="{{ route('admin.room-type.index') }}" class="btn btn-primary float-right">View All</a>
            </h6>
        </div>
        <div class="card-body">
            @include('common.alert')
            <form method="POST" action="{{ $route }}" enctype="multipart/form-data">
                @method($method)
                @csrf
                <div class="row">
                    <div class="col-md-2 required">
                        <label for="name">Room Type Name</label>
                    </div>
                    <div class="col-md-8">
                        <input type="text" name="name" value="{{$room_type ? $room_type->name : old('name')}}" class="form-control @error('name') is-invalid @enderror" autocomplete=off/>
                        @error('name')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-md-2 required">
                        <label for="room_type">Room Services</label>
                    </div>
                    <div class="col-md-8">
                        @foreach($room_services as $room_service)
                        <div class="form-check-inline mb-3">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input @error('room_services') checkbox-outline-color @enderror" value="{{ $room_service->id }}" name="room_services[]" @if($room_type && in_array($room_service->id,$room_type->roomServices->pluck('id')->toArray())) checked @endif>{{ $room_service->name }}
                            </label>
                        </div>
                        @endforeach
                        <br>
                        @error('room_services')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                </div>
                
                <div class="row mt-3 imageWrapper">
                    <div class="col-md-2 required">
                        <label for="images">Images</label>
                    </div>
                    <div class="col-md-8">
                        <div class="custom-file mb-3">
                            <input type="file" class="custom-file-input @error('images') is-invalid @enderror" id="customFile" name="images[]" multiple>
                            <label class="custom-file-label" for="customFile">Choose file</label>
                        </div>
                        @error('images')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                        @error('images.*')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                </div>

                @if($room_type)
                    <div class="row justify-content-center">
                    @foreach($room_type->getMedia('images') as $image)
                        <img src="{{$image->getUrl()}}" / width="25%" class="mr-3 mt-3">
                    @endforeach
                    </div>
                @endif

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