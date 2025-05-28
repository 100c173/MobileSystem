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
                    Add {{ $specification->mobile->name }} Specification
                </h4>
            </div>

            <div class="card-body text-primary">
                <form action="{{route('admin.mobileSpcifications.update',$specification->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('put')


                    <div class="form-group" style="display: none;">
                        <label for="exampleInputEmail">Mobile Id</label>
                        <input type="text" class="form-control" id="mobile_id" name="mobile_id" value="{{ $specification->mobile_id }}" required>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail">Mobile cpu</label>
                        <input type="text" class="form-control" id="cpu" name="cpu" value="{{ $specification->cpu }}" " required>
                            </div>

                            <div class=" form-group">
                        <label for="exampleInputEmail">Mobile ram</label>
                        <input type="text" class="form-control" id="ram" name="ram" value="{{ $specification->ram }}" required>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail">Mobile storage</label>
                        <input type="text" class="form-control" id="storage" name="storage" value="{{ $specification->storage }}" required>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail">Mobile camera</label>
                        <input type="text" class="form-control" id="camera" name="camera" value="{{ $specification->camera }}" required>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail">Mobile screen</label>
                        <input type="text" class="form-control" id="screen" name="screen" value="{{ $specification->screen }}" required>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail">Mobile battery</label>
                        <input type="text" class="form-control" id="battery" name="battery" value="{{ $specification->battery }}" required>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail">Mobile connectivity</label>
                        <input type="text" class="form-control" id="connectivity" name="connectivity" value="{{ $specification->connectivity }}" required>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail">Mobile security features</label>
                        <input type="text" class="form-control" id="security_features" name="security_features" value="{{ $specification->security_features }}" required>
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