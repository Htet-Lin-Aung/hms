<?php $route = route('admin.room.update',$room); ?>
@include('room._form',
    [   
        'room' => $room,
        'title'=>"Update Room",
        'method' =>"PATCH",
        'route' => $route,
        'btn'=>"Update"
    ]
)
