@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Detail Room
                        <a href="{{ route('admin.room.index') }}" class="btn btn-primary float-right">View All</a>
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
                            <th>Room Name</th>
                            <td>{{$room->room_no}}</td>
                        </tr>
                        <tr>
                            <th>Price</th>
                            <td>{{$room->price}} MMK</td>
                        </tr>
                        <tr>
                            <th>People</th>
                            <td>{{ $room->people }}</td>
                        </tr>
                        <tr>
                            <th>Room Type</th>
                            <td>{{ $room->roomType->name }}</td>
                        </tr>
                    </table>
                   
                    <div class="row justify-content-center">
                    @foreach($room->getMedia('images') as $image)
                        <img src="{{$image->getUrl()}}" / width="25%" class="mr-3 mt-3">
                    @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection