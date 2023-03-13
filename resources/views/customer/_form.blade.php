@extends('layouts.master')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Customers
                <a href="{{ route('admin.customer.index') }}" class="btn btn-primary float-right">View All</a>
            </h6>
        </div>
        <div class="card-body">
            @include('common.alert')
            <form method="POST" action="{{ $route }}" enctype="multipart/form-data">
                @method($method)
                @csrf

                <div class="row">
                    <div class="col-md-2">
                        <label for="status">Booking ?</label>
                    </div>
                    <div class="col-md-8 ml-4 custom-control custom-checkbox">
                        <input type="checkbox" name="status" value="booking" class="checkbox-1x custom-control-input" id="customCheck1" title="If you want to booking, click here!" autocomplete="off" @if($customer && $customer->status == 'booking') checked @endif/>
                        <label class="custom-control-label checkbox-1x" for="customCheck1" title="If you want to booking, click here!"></label>
                    </div>
                </div> 

                <div class="row mt-3">
                    <div class="col-md-2 required">
                        <label for="address">Date</label>
                    </div>
                    <div class="col-md-8">
                        <div class="t-datepicker">
                            <div class="t-check-in"></div>
                            <div class="t-check-out"></div>
                        </div>
                        @error('check_in')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                        @error('check_out')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                </div>

                <input type="hidden" value={{$customer? $customer->check_in : ''}} id="check_in"/>
                <input type="hidden" value={{$customer? $customer->check_out : ''}} id="check_out"/>

                <div class="row mt-3">
                    <div class="col-md-2 required">
                        <label for="room_id">Room No./ Name</label>
                    </div>
                    <div class="col-md-8">
                        <select class="custom-select @error('room_id') is-invalid @enderror" name="room_id">
                            <option value="">Choose...</option>
                            @foreach($rooms as $room)
                                <option value="{{ $room->id }}" @if($customer && $room->id == $customer->room_id) selected @endif>{{ $room->room_no }}</option>
                            @endforeach
                        </select> 
                        @error('room_id')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-md-2 required">
                        <label for="name">Customer Name</label>
                    </div>
                    <div class="col-md-8">
                        <input type="text" name="name" value="{{$customer ? $customer->name : old('name')}}" class="form-control @error('name') is-invalid @enderror" autocomplete=off/>
                        @error('name')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-md-2 required">
                        <label for="nrc_region">NRC</label>
                    </div>
                    <div class="col-md-8">
                        <select class="custom-select nrc nrc-region @error('nrc_region') is-invalid @enderror" name="nrc_region">
                            @foreach($nrc_regions as $region)
                                <option value="{{ $region['value'] }}" @if($customer && $region['value'] == $customer->nrc_region) selected @endif>{{ $region['name'] }}</option>
                            @endforeach
                        </select> 

                        <select class="custom-select nrc nrc-township @error('nrc_township') is-invalid @enderror" name="nrc_township">
                            @foreach($nrc_townships as $index => $township)
                                <option value="{{ $index }}" @if($customer && $township == $customer->nrc_township) selected @endif>{{ $township }}</option>
                            @endforeach
                        </select>

                        <select class="custom-select nrc nrc-type @error('nrc_type') is-invalid @enderror" name="nrc_type">
                            @foreach($nrc_types as $type)
                                <option value="{{ $type['value'] }}" @if($customer && $type['value'] == $customer->nrc_type) selected @endif>{{ $type['name'] }}</option>
                            @endforeach
                        </select> 

                        <input type="number" name="nrc_no" value="{{$customer ? $customer->nrc_no : old('nrc_no')}}" class="form-control nrc_no @error('name') is-invalid @enderror" autocomplete=off/>
                        
                        @error('nrc_region')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                        @error('nrc_township')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                        @error('nrc_type')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                        @error('nrc_no')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-md-2">
                        <label for="email">Email</label>
                    </div>
                    <div class="col-md-8">
                        <input type="text" name="email" value="{{$customer ? $customer->email : old('email')}}" class="form-control @error('email') is-invalid @enderror" autocomplete=off/>
                        @error('email')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-md-2 required">
                        <label for="phone">Phone</label>
                    </div>
                    <div class="col-md-8">
                        <input type="text" name="phone" value="{{$customer ? $customer->phone : old('phone')}}" class="form-control @error('phone') is-invalid @enderror" autocomplete=off/>
                        @error('phone')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-md-2 required">
                        <label for="address">Address</label>
                    </div>
                    <div class="col-md-8">
                        <textarea type="text" name="address" class="form-control @error('address') is-invalid @enderror" autocomplete=off>{{$customer ? $customer->address : old('address')}}</textarea>
                        @error('address')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                </div>
                
                <div class="row mt-3 imageWrapper">
                    <div class="col-md-2 required">
                        <label for="images">Images</label>
                    </div>
                    <div class="col-md-8">
                        <div class="custom-file mb-3">
                            <input type="file" class="custom-file-input @error('images') is-invalid @enderror" id="customFile" name="images[]" multiple>
                            <label class="custom-file-label" for="customFile">Choose file</label>
                        </div>
                        @error('images')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                        @error('images.*')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                </div>

                @if($customer)
                    <div class="row justify-content-center">
                    @foreach($customer->getMedia('images') as $image)
                        <img src="{{$image->getUrl()}}" / width="25%" class="mr-3 mt-3">
                    @endforeach
                    </div>
                @endif

                <div class="row mt-3">
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
@section('scripts')
<script>
$('.t-datepicker').tDatePicker({
  // the number of calendars
  numCalendar    : 2,

  // shows today title
  toDayShowTitle       : false, 

  // highlights today
  toDayHighlighted     : true,

  // custom date format
  formatDate      : 'yyyy-mm-dd',

  // limits the number of months
  limitPrevMonth : 0,
  limitNextMonth : 1,

  dateCheckIn: $('#check_in').val(),
  dateCheckOut: $('#check_out').val(),

});
</script>
@stop