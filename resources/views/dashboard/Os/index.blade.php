@extends('dashboard.layouts.app')

@section('title')
Operating System
@endsection

@include('dashboard.components.alerts')
@section('content')
<div class="page-inner">

    <div class="col-md-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="card-title m-0 d-flex align-items-center">
                    <i class="fas fa-mobile-alt me-2"></i>
                    Operating Systems control panel
                </h4>


                <button type="button" class="fancy-btn btn-success" data-bs-toggle="modal" data-bs-target="#detailsModalAddOs" title="Take Action">
                    <i class="fas fa-plus"></i> Add operating system
                </button>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="multi-filter-select" class="display table table-striped table-hover">
                        <thead>
                            <tr id="filter-row">
                                <th><input type="text" placeholder="Search Id" class="form-control form-control-sm" /></th>
                                <th><input type="text" placeholder="Search Name" class="form-control form-control-sm" /></th>

                                <th><input type="text" placeholder="Search Created Date" class="form-control form-control-sm" /></th>
                                <th></th>
                            </tr>
                            </th> {{-- Action column - no filter --}}
                            </tr>

                            <tr>
                                <th>#</th>
                                <th>Operating System Name</th>
                                <th>Created Date</th>
                                <th style="width: 10%">Action</th>
                            </tr>
                        </thead>
                        @php
                        $counter= 1;
                        @endphp
                        <tbody>
                            @foreach($oss as $os)
                            <tr>
                                <td> {{$counter++}} </td>

                                <td> {{ $os->name }}</td>
                                <td> {{ $os->created_at}}</td>

                                <td>
                                    <div class="btn-group" role="group" aria-label="Action Buttons">

                                        <div class="btn-group">
                                            <a href="{{route('mobilesByOs',$os->id)}}">
                                                <button type="button" class="fancy-btn btn-view" >
                                                    <i class="fa fa-eye me-1"></i>
                                                    view mobiles
                                                </button>
                                            </a>
                                        </div>

                                        <button type="button" class="fancy-btn btn-update" data-bs-toggle="modal" data-bs-target="#detailsModalEditOs-{{$os->id }}-{{$os->name}}" title="Take Action">
                                             <i class="fa fa-pen me-1"></i> Update
                                        </button>
                                        <button type="button" class="fancy-btn btn-delete " data-bs-toggle="modal" data-bs-target="#actionModalOsdestroy-{{ $os->id }}" title="Take Action">
                                            <i class="fa fa-trash me-1"></i> Delete
                                        </button>

                                    </div>
                                    @include('dashboard.modals.oss.add_os')
                                    @include('dashboard.modals.oss.edit_os')
                                    @include('dashboard.modals.oss.delete_os')




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
