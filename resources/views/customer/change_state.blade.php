<form action="{{ route('admin.customer.changeState',$customer)  }}" method="POST" class="d-unset">
    @method('PUT')
    @csrf
    <input type="hidden" name="status" value={{$customer->state}} />
    <button onClick="return confirm('Are you sure you want to change?')"class="btn @if($customer->status == 'booking') btn-info @else btn-warning @endif  btn-sm"> {{ $customer->state  }} </button>
</form>