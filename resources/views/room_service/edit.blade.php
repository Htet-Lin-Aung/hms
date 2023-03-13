<?php $route = route('admin.room-service.update',$room_service); ?>
@include('room_service._form',
    [   
        'room_service' => $room_service,
        'title'=>"Update Room Service",
        'method' =>"PATCH",
        'route' => $route,
        'btn'=>"Update"
    ]
)
