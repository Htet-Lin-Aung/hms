@if (Session::has('success'))
    <p class="text-success"> {{ Session('success') }}</p>
@endif
@if (Session::has('danger'))
    <p class="text-danger"> {{ Session('danger') }}</p>
@endif