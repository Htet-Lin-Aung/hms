@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Detail RoomType
                        <a href="{{ route('admin.room-type.index') }}" class="btn btn-primary float-right">View All</a>
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
                            <th>Room Type Name</th>
                            <td>{{$room_type->name}}</td>
                        </tr>
                        <tr>
                            <th>Room Service</th>
                            <td>
                              @foreach($room_type->roomServices as $service)
                                <div class="form-check-inline mb-3">
                                    <label class="form-check-label">
                                        <span class="fa fa-check-square mr-1"></span>{{$service->name}}
                                    </label>
                                </div>
                              @endforeach
                            </td>
                        </tr>
                    </table>
                   
                    <div class="row justify-content-center">
                    @foreach($room_type->getMedia('images') as $image)
                        <img src="{{$image->getUrl()}}" / width="25%" class="mr-3 mt-3">
                    @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection