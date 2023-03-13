<?php $route = route('admin.customer.update',$customer); ?>
@include('customer._form',
    [   
        'customer' => $customer,
        'title'=>"Update Customer",
        'method' =>"PATCH",
        'route' => $route,
        'btn'=>"Update"
    ]
)
