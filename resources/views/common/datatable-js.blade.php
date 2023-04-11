@section('scripts')
    <script>
        $(function () {
            var dom = '{!! isset($dom) ?  $dom : 'ftp' !!}';
            var table = $('#dataTable').DataTable({
                autoWidth: false,
                dom: dom,
                pageLength: 10
            });

            // Add custom label to search filter row
            // var searchRow = $('div.dataTables_filter');
            // var customLabel = $('<strong>').text(message).addClass('custom-strong');
            // customLabel.css('float', 'right'); // Add CSS to float label to the right
            // searchRow.prepend(customLabel);// Append label to search row
        });
    </script>
@endsection