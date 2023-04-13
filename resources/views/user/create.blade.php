<?php $route = route('admin.user.store'); ?>
@include('user._form',
    [   
        'user' => "",
        'roles' => $roles,
        'title'=>"Create User",
        'method' =>"POST",
        'route' => $route,
        'btn'=>"Submit"
    ]
)