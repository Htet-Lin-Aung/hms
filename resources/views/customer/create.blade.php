<?php $route = route('admin.customer.store'); ?>
@include('customer._form',
    [   
        'customer' => "",
        'title'=>"Create Customer",
        'method' =>"POST",
        'route' => $route,
        'btn'=>"Submit"
    ]
)