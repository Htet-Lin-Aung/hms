<?php $route = route('admin.room-service.store'); ?>
@include('room_service._form',
    [   
        'room_service' => "",
        'title'=>"Create Room Service",
        'method' =>"POST",
        'route' => $route,
        'btn'=>"Submit"
    ]
)