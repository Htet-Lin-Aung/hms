@extends('layouts.master')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
   
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        
        <div class="card-body">
            @include('common.alert')
            <form action="{{ route('admin.report') }}" method="GET">
                <div class="row">
                    <div class="col-md-2">
                        <div class="form-group">
                          <label for="start_date">Start Date:</label>
                          <input type="date" class="form-control" id="start_date" name="start_date" value="{{ request()->start_date ?? old('start_date') }}">
                        </div>
                    </div>

                    <div class="col-md-2">
                        <div class="form-group">
                          <label for="end_date">End Date:</label>
                          <input type="date" class="form-control" id="end_date" name="end_date" value="{{ request()->end_date ?? old('end_date') }}">
                        </div>
                    </div>

                    <div class="col-md-2">
                        <div class="form-group">
                          <label for="payment_type">Payment Type</label>
                          <select class="form-control" name="payment_type">
                            <option value="">Select .....</option>
                            <option value="prepaid" @if((old('payment_type') == 'prepaid') || request()->payment_type == 'prepaid') selected @endif>Prepaid</option>
                            <option value="balance" @if((old('payment_type') == 'balance') || request()->payment_type == 'balance') selected @endif>Balance</option>
                            <option value="postpaid" @if((old('payment_type') == 'postpaid') || request()->payment_type == 'postpaid') selected @endif>Postpaid</option>
                          </select>
                        </div>
                    </div>

                    <div class="col-md-2">
                        <div class="form-group">
                            <label>.</label>
                            <button class="btn btn-success form-control" type="submit" value="Search"><span class="fa fa-search"></span> Search</button>
                        </div>
                    </div>

                    <div class="col-md-2">
                        <div class="form-group">
                            <label>.</label>
                            <button onclick="window.location.href='{{ route('admin.report') }}'" class="btn btn-danger form-control" type="button">Reset
                            </button>
                        </div>
                    </div>


                    <div class="col-md-2">
                        <div class="form-group">
                            <label>Total Amount:</label>
                            <input type="text" class="form-control" value="{{$reports->sum('amount')}}" readonly>
                        </div>
                    </div>
                </div>
            </form>

            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead class="table-primary">
                        <tr>
                            <th>#</th>
                            <th>Customer Name</th>
							<th>Phone</th>
							<th>Check In</th>
                            <th>Check Out</th>
                            <th>Payment Type</th>
                            <th>Payment Date</th>
                            <th>Amount</th>
                        </tr>
                    </thead>
                    <tbody>
						@foreach ($reports as $index=>$report )
							<tr>
								<td>{{ $index+1 }}</td>
								<td>{{ $report->customer->name }}</td>
								<td>{{ $report->customer->phone }}</td>
								<td>{{ $report->customer->check_in }}</td>
                                <td>{{ $report->customer->check_out }}</td>
                                <td>{{ $report->payment_type }}</td>
                                <td>{{ $report->created_at->format('d-m-Y') }}</td>
								<td>{{ $report->amount }}</td>
							</tr>
						@endforeach
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@include('common.datatable-js',['dom'=> 'tp'])
@endsection