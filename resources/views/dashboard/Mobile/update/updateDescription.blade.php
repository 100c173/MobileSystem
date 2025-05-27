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
                     Edit {{ $description->mobile->name }} Description  
                </h4>
            </div>

                <div class="card-body text-primary">
                    <form action="{{route(auth()->user()->getRoleNames()->first().'.mobileDescriptions.update',$description->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('put')

                        <div class="form-group" style="display: none;" >
                            <label for="exampleInputEmail" >Mobile Id</label>
                            <input type="text" class="form-control" id="mobile_id" name="mobile_id" value="{{ $description->mobile_id }}" required>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail" >Mobile design dimensions</label>
                            <input type="text" class="form-control" id="design_dimensions" name="design_dimensions" value="{{ $description->design_dimensions }}" placeholder="Enter mobile design_dimensions" required>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail" >Mobile display</label>
                            <input type="text" class="form-control" id="display" name="display" value="{{ $description->display }}" placeholder="Enter mobile display" required>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail" >Mobile performance cpu</label>
                            <input type="text" class="form-control" id="performance_cpu" value="{{ $description->performance_cpu }}" name="performance_cpu" placeholder="Enter mobile performance cpu" required>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail" >Mobile storage desc</label>
                            <input type="text" class="form-control" id="storage_desc"  value="{{ $description->storage_desc }}" name="storage_desc" placeholder="Enter mobile storage desc" required>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail" >Mobile connectivity desc</label>
                            <input type="text" class="form-control" id="connectivity_desc" value="{{ $description->connectivity_desc }}" name="connectivity_desc" placeholder="Enter mobile connectivity desc" required>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail" >Mobile battery desc</label>
                            <input type="text" class="form-control" id="battery_desc" name="battery_desc"  value="{{ $description->battery_desc }}" placeholder="Enter mobile battery desc" required>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail" >Mobile extra features</label>
                            <input type="text" class="form-control" id="extra_features" name="extra_features"  value="{{ $description->extra_features }}" placeholder="Enter mobile extra features" required>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail" >Mobile  security privacy</label>
                            <input type="text" class="form-control" id="security_privacy" name="security_privacy" value="{{ $description->security_privacy }}" placeholder="Enter mobile  security privacy" required>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail" >Mobile security pros</label>
                            <input type="text" class="form-control" id="pros" name="pros" value="{{ $description->pros }}" placeholder="Enter mobile  pros" required>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail" >Mobile security cons</label>
                            <input type="text" class="form-control" id="cons" name="cons" value="{{ $description->cons }}" placeholder="Enter mobile  cons" required>
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
    $(document).ready(function () {
        const table = $('#multi-filter-select').DataTable({
            pageLength: 10
        });

        // اربط كل input في صف الفلاتر بالعمود المقابل له
        $('#filter-row input').each(function (i) {
            $(this).on('keyup change', function () {
                table.column(i).search(this.value).draw();
            });
        });
    });
</script>
@endpush
