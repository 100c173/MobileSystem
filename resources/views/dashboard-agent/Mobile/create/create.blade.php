@extends('dashboard-agent.layouts.app')

@section('title')
Mobile
@endsection

@include('dashboard-agent.components.alerts')
@section('content')
<div class="page-inner">

    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title m-0 d-flex align-items-center">
                    <i class="fas fa-mobile-alt me-2"></i>
                    Add new Mobiles
                </h4>
            </div>

            <div class="card-body text-primary">
                <form action="{{route('agent.mobiles.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label for="exampleInputEmail">Mobile name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter mobile name" required>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail">Mobile brand</label>
                        <input type="text" class="form-control" id="brand" name="brand" placeholder="Enter mobile brand" required>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail">Operating system </label>
                        <input type="text" class="form-control" id="os" name="os" placeholder="Enter mobile Operating system" required>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail">Release date </label>
                        <input type="date" class="form-control" id="release_date" name="release_date" placeholder="Enter mobile Release date" required>
                    </div>

            </div>

            <div class="card-footer" style="padding-left: 1200px;">
                <button class="fancy-btn btn-success" type="submit"><i class="fas fa-save"></i> Save</button>
                <button type="button" class="fancy-btn btn-delete" data-bs-dismiss="modal">
                    <i class="fa fa-times me-1"></i> Close
                </button>
            </div>
            </form>

        </div> <!-- /.card-body -->
    </div> <!-- /.card -->
</div> <!-- /.col-md-12 -->
</div> <!-- /.page-inner -->
@endsection

@push('scripts')
<script>
    $(document).ready(function() {
        const table = $('#multi-filter-select').DataTable({
            pageLength: 10
        });

        // اربط كل input في صف الفلاتر بالعمود المقابل له
        $('#filter-row input').each(function(i) {
            $(this).on('keyup change', function() {
                table.column(i).search(this.value).draw();
            });
        });
    });
</script>
@endpush