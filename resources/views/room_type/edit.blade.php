<?php $route = route('admin.room-type.update',$room_type); ?>
@include('room_type._form',
    [   
        'room_type' => $room_type,
        'title'=>"Update Room Type",
        'method' =>"PATCH",
        'route' => $route,
        'btn'=>"Update"
    ]
)
