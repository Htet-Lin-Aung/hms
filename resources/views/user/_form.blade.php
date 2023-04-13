@extends('layouts.master')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Rooms
                <a href="{{ route('admin.user.index') }}" class="btn btn-primary float-right">View All</a>
            </h6>
        </div>
        <div class="card-body">
            @include('common.alert')
            <form method="POST" action="{{ $route }}" enctype="multipart/form-data">
                @method($method)
                @csrf
                <div class="row">
                    <div class="col-md-2 required">
                        <label for="name">Name</label>
                    </div>
                    <div class="col-md-8">
                        <input type="text" name="name" value="{{$user ? $user->name : old('name')}}" class="form-control @error('name') is-invalid @enderror" autocomplete=off/>
                        @error('name')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-md-2 required">
                        <label for="email">Email</label>
                    </div>
                    <div class="col-md-8">
                        <div class="input-group">
                            <input type="email" name="email" value="{{$user ? $user->email : old('email')}}" class="form-control @error('email') is-invalid @enderror" autocomplete=off>
                        </div>
                        @error('email')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-md-2 required">
                        <label for="password">Password</label>
                    </div>
                    <div class="col-md-8">
                        <div class="input-group">
                            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" autocomplete="new-password">
                        </div>
                        @error('password')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-md-2 required">
                        <label for="password">Confirm Password</label>
                    </div>
                    <div class="col-md-8">
                        <div class="input-group">
                            <input id="password-confirm" type="password" class="form-control @error('password') is-invalid @enderror" name="password_confirmation" autocomplete="new-password">
                        </div>
                        @error('password')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-md-2 required">
                        <label for="role">Role</label>
                    </div>
                    <div class="col-md-8">
                        <select class="custom-select @error('roles') is-invalid @enderror" name="roles[]" multiple>
                            <!-- <option value="">Choose...</option> -->
                            @foreach ($roles as $key => $value)
                                <option value="{{ $key }}"{{ in_array($key, old('roles', [])) || ($user ? $user->roles->contains($key) : false ) ? 'selected' : '' }}>{{ $value }}</option>
                            @endforeach
                        </select> 
                        @error('roles')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                </div>

                <div class="col-md-12 mt-3">
                    <div class="col text-center">
                        <button type="submit" class="btn btn-primary">{{$btn}}</button>
                    </div>
                </div>
            </form>   
            
        </div>
    </div>
</div>
<!-- /.container-fluid -->
@endsection