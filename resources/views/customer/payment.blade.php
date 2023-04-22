<!-- The Modal -->
<div class="modal" id="myModal{{$customer->id}}">
    <div class="modal-dialog">
        <div class="modal-content">
      
            <!-- Modal Header -->
            <div class="modal-header">
              <h4 class="modal-title text-primary">Payment Details</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            
            <!-- Modal body -->
            <div class="modal-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <tr>
                            <th>Status</th>
                            <td class="@if($customer->payment_status == 'complete') bg-success @else bg-warning @endif text-white text-uppercase">{{$customer->payment_status}}</td>
                        </tr>
                        <tr>
                            <th>Prepaid</th>
                            <td>{{ $customer->prepaid }} MMK</td>
                        </tr>
                        <tr>
                            <th>Balance</th>
                            <td>{{$customer->balance}} MMK</td>
                        </tr>
                        <tr>
                            <th>Total</th>
                            <td>{{$customer->room->price}} MMK</td>
                        </tr>
                    </table>
                </div>

                @if($customer->payment_status != 'complete')
                <form action="{{ route('admin.payment.make',$customer->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    <div class="row mt-3">
                        <div class="col-md-4 required">
                            <label for="payment_type">Payment Type</label>
                        </div>
                        <div class="col-md-8">
                            <select class="custom-select @error('payment_type') is-invalid @enderror" name="payment_type">
                                <option value="">Choose...</option>
                                    <option value="prepaid">Prepaid</option>
                                    <option value="balance">Balance</option>
                                    <option value="postpaid">Postpaid</option>
                            </select> 
                            @error('payment_type')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-4 required">
                            <label for="amount">Amount</label>
                        </div>
                        <div class="col-md-8">
                            <input type="number" name="amount" value="{{old('amount')}}" class="form-control @error('amount') is-invalid @enderror" autocomplete=off/>
                            @error('amount')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                
                    <!-- Modal footer -->
                    <div class="modal-footer justify-content-center">
                        <button type="submit" class="btn btn-primary" >Submit</button>
                    </div>
                </form>
                @endif
            
            </div>
        </div>
    </div>
  </div>