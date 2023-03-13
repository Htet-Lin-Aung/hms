<?php $route = route('admin.room.store'); ?>
@include('room._form',
    [   
        'room' => "",
        'title'=>"Create Room",
        'method' =>"POST",
        'route' => $route,
        'btn'=>"Submit"
    ]
)