@extends('layouts.master')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Rooms
                <a href="{{ route('admin.room.index') }}" class="btn btn-primary float-right">View All</a>
            </h6>
        </div>
        <div class="card-body">
            @include('common.alert')
            <form method="POST" action="{{ $route }}" enctype="multipart/form-data">
                @method($method)
                @csrf
                <div class="row">
                    <div class="col-md-2 required">
                        <label for="room_no">Room No./Name</label>
                    </div>
                    <div class="col-md-8">
                        <input type="text" name="room_no" value="{{$room ? $room->room_no : old('room_no')}}" class="form-control @error('room_no') is-invalid @enderror" autocomplete=off/>
                        @error('room_no')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-md-2 required">
                        <label for="price">Price</label>
                    </div>
                    <div class="col-md-8">
                        <div class="input-group">
                            <input type="number" name="price" value="{{$room ? $room->price : old('price')}}" class="form-control @error('price') is-invalid @enderror" autocomplete=off>
                            <div class="input-group-append">
                                <span class="input-group-text @error('price') border-danger @enderror">MMK</span>
                            </div>
                        </div>
                        @error('price')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-md-2 required">
                        <label for="people">People</label>
                    </div>
                    <div class="col-md-8">
                        <input type="number" name="people" value="{{$room ? $room->people : old('people')}}" class="form-control @error('people') is-invalid @enderror" autocomplete="off" />
                        @error('people')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-md-2 required">
                        <label for="room_type_id">Room Type</label>
                    </div>
                    <div class="col-md-8">
                        <select class="custom-select @error('room_type_id') is-invalid @enderror" name="room_type_id">
                            <option value="">Choose...</option>
                            @foreach($room_types as $room_type)
                                <option value="{{ $room_type->id }}" @if($room && $room_type->id == $room->room_type_id) selected @endif>{{ $room_type->name }}</option>
                            @endforeach
                        </select> 
                        @error('room_type_id')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-md-2">
                        <label for="other_image">Other Image</label>
                    </div>
                    <div class="col-md-8 ml-4 custom-control custom-checkbox">
                        <input type="checkbox" onclick="showImage()" class="checkbox-1x custom-control-input" id="customCheck1" title="If you want to add other images, click here!" autocomplete="off" />
                        <label class="custom-control-label checkbox-1x" for="customCheck1" title="If you want to add other images, click here!"></label>
                    </div>
                </div>
                
                <div class="row mt-3 imageWrapper" hidden>
                    <div class="col-md-2">
                    </div>
                    <div class="col-md-8">
                        <div class="custom-file mb-3">
                            <input type="file" class="custom-file-input" id="customFile" name="other_images[]" multiple>
                            <label class="custom-file-label" for="customFile">Choose file</label>
                        </div>
                    </div>
                </div>

                <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <div id="upload_preview" class="row" style="margin:10px;"></div>
                </div>

                @if($room)
                    <div class="row justify-content-center">
                    @foreach($room->getMedia('images') as $image)
                        <img src="{{$image->getUrl()}}" / width="25%" class="mr-3 mt-3">
                    @endforeach
                    </div>
                @endif

                <div class="col-md-12 mt-3">
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
@section('scripts')
@include('common.image_preview')
<script>
    function showImage(){
        $('.imageWrapper').attr('hidden','hidden');
        if($('#customCheck1').is(":checked"))
        {
            $('.imageWrapper').removeAttr('hidden');
        } 
    }
</script>
@stop