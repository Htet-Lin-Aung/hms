<?php $route = route('admin.user.update',$user); ?>
@include('user._form',
    [   
        'user' => $user,
        'roles' => $roles,
        'title'=>"Update User",
        'method' =>"PATCH",
        'route' => $route,
        'btn'=>"Update"
    ]
)
