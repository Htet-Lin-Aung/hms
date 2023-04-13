<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ url('/admin') }}">
        <div class="sidebar-brand-icon">
            <i class="fas fa-hotel"></i>
        </div>
        <div class="sidebar-brand-text mx-3"> {{ config('app.name') }}</div>
    </a>
    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider">
    @role('admin')
    <!-- Nav Item - Users Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link @if(!request()->is('admin/user*')) collapsed @endif " href="#" data-toggle="collapse" data-target="#collapseuser"
            aria-expanded="true" aria-controls="collapseuser">
            <i class="fas fa-fw fa-users" aria-hidden="true"></i>
            <span>Users</span>
        </a>
        <div id="collapseuser" class="collapse @if(request()->is('admin/user*')) show @endif " aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('admin.user.create') }}">Add New</a>
                <a class="collapse-item" href="{{ route('admin.user.index') }}">View All</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Roomservice Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link @if(!request()->is('admin/room-service*')) collapsed @endif " href="#" data-toggle="collapse" data-target="#collapseservice"
            aria-expanded="true" aria-controls="collapseservice">
            <i class="fa fa-plus-square" aria-hidden="true"></i>
            <span>RoomService</span>
        </a>
        <div id="collapseservice" class="collapse @if(request()->is('admin/room-service*')) show @endif " aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('admin.room-service.create') }}">Add New</a>
                <a class="collapse-item" href="{{ route('admin.room-service.index') }}">View All</a>
            </div>
        </div>
    </li>
    <!-- Nav Item - Roomtype Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link @if(!request()->is('admin/room-type*')) collapsed @endif " href="#" data-toggle="collapse" data-target="#collapseone"
            aria-expanded="true" aria-controls="collapseone">
            <i class="fas fa-fw fa-table"></i>
            <span>Room Type</span>
        </a>
        <div id="collapseone" class="collapse @if(request()->is('admin/room-type*')) show @endif " aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('admin.room-type.create') }}">Add New</a>
                <a class="collapse-item" href="{{ route('admin.room-type.index') }}">View All</a>
            </div>
        </div>
    </li>
     <!-- Nav Item - Rooms Collapse Menu -->
     <li class="nav-item">
        <a class="nav-link @if(!request()->is('admin/room*')) collapsed @endif " href="#" data-toggle="collapse" data-target="#collapseTwo"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-bed"></i>
            <span>Rooms</span>
        </a>
        <div id="collapseTwo" class="collapse @if(request()->is('admin/rooms*')) show @endif " aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('admin.room.create') }}">Add New</a>
                <a class="collapse-item" href="{{ route('admin.room.index') }}">View All</a>
            </div>
        </div>
    </li>
    @endrole
    <!-- Nav Item - Customer Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link @if(!request()->is('admin/customer*')) collapsed @endif " href="#" data-toggle="collapse" data-target="#collapsecustomer"
            aria-expanded="true" aria-controls="collapseone">
            <i class="fas fa-fw fa-users"></i>
            <span>Customer</span>
        </a>
        <div id="collapsecustomer" class="collapse @if(request()->is('admin/customer*')) show @endif " aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ url('admin/customer/create') }}">Add New</a>
                <a class="collapse-item" href="{{ url('admin/customer?status=booking') }}">Booking</a>
                <a class="collapse-item" href="{{ url('admin/customer?status=checkin') }}">Check In</a>
                <a class="collapse-item" href="{{ url('admin/customer?status=checkout') }}">Check Out</a>
            </div>
        </div>
    </li>

    @role('admin')
    <!-- Nav Item - Report -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.report') }}">
            <i class="fa fa-flag" aria-hidden="true"></i>
            <span>Report</span></a>
    </li>
    @endrole
    
</ul>
<!-- End of Sidebar -->