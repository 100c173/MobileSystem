@extends('dashboard.layouts.app')
@section('content')
<div class="page-inner">
    @include('dashboard.partials.welcome')
    @include('dashboard.components.card')


    <div class="row">
        @include('dashboard.partials.new-customers')
        @include('dashboard.partials.new-products')
    </div>

    @include('dashboard.tables.datatables')
</div>
@endsection

@push('scripts')

<!-- For datatable -->
<script>
    $(document).ready(function() {
        var table = $('#multi-filter-select').DataTable({
            pageLength: 5,
            initComplete: function() {
                this.api()
                    .columns()
                    .every(function(index) {

                        if (index === 6) return;

                        var column = this;
                        var select = $('<select class="form-select"><option value=""></option></select>')
                            .appendTo($(column.footer()).empty())
                            .on('change', function() {
                                var val = $.fn.dataTable.util.escapeRegex($(this).val());
                                column.search(val ? '^' + val + '$' : '', true, false).draw();
                            });

                        column.data().unique().sort().each(function(d, j) {
                            select.append('<option value="' + d + '">' + d + '</option>');
                        });
                    });
            }
        });
    });
</script>

@endpush