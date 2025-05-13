@extends('dashboard.layouts.app')

@section('title')
Mobile
@endsection

@include('dashboard.components.alerts')
@section('content')
<div class="page-inner">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            {!! Breadcrumbs::render('mobiles.index') !!}
        </ol>
    </nav>
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="multi-filter-select" class="display table table-striped table-hover">
                        <thead>
                            <tr id="filter-row">
                                <th><input type="text" placeholder="Search Id" class="form-control form-control-sm" /></th>
                                <th><input type="text" placeholder="Search Image" class="form-control form-control-sm" /></th>
                                <th><input type="text" placeholder="Search Name" class="form-control form-control-sm" /></th>
                                <th><input type="text" placeholder="Search Brand" class="form-control form-control-sm" /></th>
                                <th><input type="text" placeholder="Search Os" class="form-control form-control-sm" /></th>
                                <th><input type="text" placeholder="Search Release Dat" class="form-control form-control-sm" /></th>
                                <th></th>
                            </tr></th> {{-- Action column - no filter --}}
                            </tr>

                            {{-- رؤوس الأعمدة --}}
                            <tr>
                                 <th>#</th>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Brand</th>
                                <th>Os</th>
                                <th>Release Date</th>
                                <th style="width: 10%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($mobiles as $index => $mobile)
                            <tr>
                                <td> {{ $index + 1 }}</td>
                                <td> <img src="{{asset('assets/'.$mobile->primaryImage->image_url)}}" alt="{{ $mobile->primaryImage->image_url}}" style="width:100px;height:100px;object-fit:cover;border:1px solid #ccc;padding:4px;"> </td>
                                <td> {{ $mobile->name }}</td>
                                <td> {{ $mobile->brand }}</td>
                                <td> {{ $mobile->os }}</td>
                                <td> {{ $mobile->release_date}}</td>
                                <td>
                                    <div class="btn-group" role="group" aria-label="Action Buttons">
                                        <button type="button" class="btn btn-outline-info btn-sm px-3" data-bs-toggle="modal" data-bs-target="#detailsModal-" title="View Details">
                                            <i class="fa fa-eye me-1"></i> View
                                        </button>

                                        <button type="button" class="btn btn-outline-primary btn-sm px-3" data-bs-toggle="modal" data-bs-target="#actionModal-" title="Take Action">
                                            <i class="fa fa-bolt me-1"></i> Action
                                        </button>

                                    </div>

                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div> <!-- /.table-responsive -->
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
