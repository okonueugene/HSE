<script>
    var ranges = {
        'Today': [moment(), moment()],
        'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
        'Last 7 Days': [moment().subtract(6, 'days'), moment()],
        'Last 30 Days': [moment().subtract(29, 'days'), moment()],
        'This Month': [moment().startOf('month'), moment().endOf('month')],
        'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf(
            'month')],
        'This Year': [moment().startOf('year'), moment().endOf('year')],
        'Last Year': [moment().subtract(1, 'year').startOf('year'), moment().subtract(1, 'year').endOf('year')]
    };

    if ($('#daterange').length > 0) {
        $('#daterange').daterangepicker({
            opens: 'bottom',
            ranges: ranges
        }, function(start, end, label) {
            $('#daterange').trigger('change');
        });
    }

    function __initializePageTable(url,columns,filters = null) {
        _page_table = $('#page_table').DataTable({
            @include('layout.export_buttons')
            processing: true,
            serverSide: false,
            ajax: {
                url: url,
                data: function(d) {
                    d.filters = filters;
                }
            },
            columnDefs: [{
                "targets": 1,
                "orderable": false,
                "searchable": false
            }],
            columns: columns,
            createdRow: function(row, data, dataIndex) {}
        });

        return _page_table;

    }
</script>
