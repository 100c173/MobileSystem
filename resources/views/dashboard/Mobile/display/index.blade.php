@extends('dashboard.layouts.app')

@section('title')
Mobile
@endsection

@include('dashboard.components.alerts')
@section('content')
<div class="page-inner">

    <div class="col-md-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="card-title m-0 d-flex align-items-center">
                    <i class="fas fa-mobile-alt me-2"></i>
                    Mobiles control panel
                </h4>

                <a href="{{ route('admin.mobiles.create') }}" class="fancy-btn btn-success" style="border-radius: 25px;">
                    <i class="fas fa-plus"></i> Add mobile
                </a>
            </div>
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
                            </tr>
                            </th> {{-- Action column - no filter --}}
                            </tr>

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
                        @php
                        $counter= 1;
                        @endphp
                        <tbody>
                            @foreach($mobiles as $mobile)
                            <tr>
                                <td> {{$counter++}} </td>
                                @if($mobile->primaryImage)
                                <td> <img src="{{asset($mobile->primaryImage->image_url)}}" alt="{{ $mobile->primaryImage->image_url}}" style="width:100px;height:100px;object-fit:cover;border:1px solid #ccc;padding:4px;"> </td>
                                @else
                                <td><img style="max-height: 350px; max-width:100%" class="card-img-top w-100" src="{{asset('uploads/defaultImages/default_mobile.webp')}}"></td>
                                @endif
                                <td> {{ $mobile->name }}</td>
                                <td> {{ $mobile->brand }}</td>
                                <td> {{ $mobile->os }}</td>
                                <td> {{ $mobile->release_date}}</td>

                                <td>
                                    <div class="btn-group" role="group" aria-label="Action Buttons">
                                        <div class="btn-group">
                                            <button type="button" class="fancy-btn btn-view dropdown-toggle" data-bs-toggle="dropdown">
                                                <i class="fa fa-eye me-1"></i>
                                                view
                                            </button>
                                            <div class="dropdown-menu p-2 text-center" style="min-width: 180px; height:150px">
                                                <a href="{{route('admin.specification',$mobile->id)}}">
                                                    <button class="fancy-btn btn-view" style="width: 180px;"><i class="fa fa-eye me-1"></i>Mobile Specification</button>
                                                </a>
                                                <div style="height: 10px;"></div>
                                                <a href="{{route('admin.description',$mobile->id)}}">
                                                    <button class="fancy-btn btn-view" style="width: 180px;"><i class="fa fa-eye me-1"></i>Mobile description </button>
                                                </a>
                                                <div style="height: 10px;"></div>
                                                <a href="{{route('admin.images',$mobile->id)}}">
                                                    <button class="fancy-btn btn-view" style="width: 180px;"> <i class="fa fa-eye me-1"></i> Mobile images</button>
                                                </a>
                                            </div>
                                        </div>

                                        <a href="{{route('admin.mobiles.edit',$mobile->id)}}">
                                            <button type="button" class="fancy-btn btn-update">
                                                <i class="fa fa-pen me-1"></i> Update
                                            </button>
                                        </a>


                                        <button type="button" class="fancy-btn btn-delete " data-bs-toggle="modal" data-bs-target="#actionModalMobileDestroy-{{$mobile->id}}" title="Take Action">
                                            <i class="fa fa-trash me-1"></i> Delete
                                        </button>

                                    </div>
                                    @include('dashboard.modals.mobile-destroy')
                                </td>

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