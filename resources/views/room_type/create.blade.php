<?php $route = route('admin.room-type.store'); ?>
@include('room_type._form',
    [   
        'room_type' => "",
        'room_services' => $room_services,
        'title'=>"Create Room Type",
        'method' =>"POST",
        'route' => $route,
        'btn'=>"Submit"
    ]
)