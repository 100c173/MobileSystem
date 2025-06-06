@extends('dashboard.layouts.app')

@section('title')
Mobile
@endsection

@include('dashboard.components.alerts')
@section('content')
<div class="page-inner">

    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title m-0 d-flex align-items-center">
                    <i class="fas fa-mobile-alt me-2"></i>
                    Edit {{ $mobile->name }}
                </h4>
            </div>

            <div class="card-body text-primary">
                <form action="{{route('admin.mobiles.update',$mobile->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('put')

                    <div class="form-group">
                        <label for="exampleInputEmail">Mobile name</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{$mobile->name}}" placeholder="Enter mobile name" required>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail">Mobile brand</label>
                        <input type="text" class="form-control" id="brand_id" name="brand_id" value="{{$mobile->brand_id}}" placeholder="Enter mobile brand" required>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail">Operating system </label>
                        <input type="text" class="form-control" id="operating_system_id" name="operating_system_id" value="{{$mobile->operating_system_id}}" placeholder="Enter mobile Operating system" required>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail">Release date </label>
                        <input type="date" class="form-control" id="release_date" value="{{$mobile->release_date}}" name="release_date" placeholder="Enter mobile Release date" required>
                    </div>

            </div>

            <div class="card-footer" style="padding-left: 1200px;">
                <button class="fancy-btn btn-success" type="submit"><i class="fas fa-save"></i> Save updates</button>
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
