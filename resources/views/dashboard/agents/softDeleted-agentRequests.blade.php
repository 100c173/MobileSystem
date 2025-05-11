@extends('dashboard.layouts.app')
@section('title')
Agent Requests
@endsection

@section('content')
@include('dashboard.components.alerts')

<div class="page-inner">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            {!! Breadcrumbs::render('agent-requests-softDeleted') !!}
        </ol>
    </nav>
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="multi-filter-select" class="display table table-striped table-hover">
                        <thead>
                            {{-- صف الفلاتر --}}
                            <tr id="filter-row">
                                <th><input type="text" placeholder="Search #" class="form-control form-control-sm" id="search-id" /></th>
                                <th><input type="text" placeholder="Search Name" class="form-control form-control-sm" id="search-name" /></th>
                                <th><input type="text" placeholder="Search Business" class="form-control form-control-sm" id="search-business" /></th>
                                <th>
                                    <select class="form-select form-select-sm" id="filter-address">
                                        <option value="">All Address</option>
                                        @foreach($unique_addresses as $address) {{-- افترض أن لديك قائمة العناوين --}}
                                        <option value="{{ $address }}">{{ $address }}</option>
                                        @endforeach
                                    </select>
                                </th>
                                <!-- <th>
                                        <select class="form-select form-select-sm" id="filter-status">
                                            <option value="">All Status</option>
                                            <option value="rejected">Rejected</option>
                                            <option value="approved">Approved</option>
                                            <option value="pending">Pending</option>
                                        </select>
                                    </th> -->
                                <th></th> {{-- Action column - no filter --}}
                            </tr>

                            {{-- رؤوس الأعمدة --}}
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Business Name</th>
                                <th>Address</th>
                                <th>Status</th>
                                <th style="width: 10%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($agent_requests as $index => $agent_request)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $agent_request->user->name }}</td>
                                <td>{{ $agent_request->business_name }}</td>
                                <td>{{ $agent_request->address }}</td>
                                <td>
                                    <span class="text-danger">
                                        <i class="fas fa-times-circle"></i>
                                        {{$agent_request->status}}
                                    </span>
                                </td>
                                <td>
                                    <div class="btn-group" role="group" aria-label="Action Buttons">

                                        <button type="button" class="btn btn-outline-info btn-sm px-3" data-bs-toggle="modal" data-bs-target="#detailsModal-{{ $agent_request->id }}" title="View Details">
                                            <i class="fa fa-eye me-1"></i> View
                                        </button>

                                        <button type="button" class="btn btn-outline-danger btn-sm px-3" data-bs-toggle="modal" data-bs-target="#actionModal4-{{ $agent_request->id }}" title="Take Action">
                                            <i class="fa fa-trash me-1"> </i> Delete
                                        </button>
                                        <button type="button" class="btn btn-outline-success btn-sm px-3" data-bs-toggle="modal" data-bs-target="#actionModal3-{{ $agent_request->id }}" title="Take Action">
                                            <i class="fa fa-undo me-1"></i> Rrestore
                                        </button>

                                    </div>
                                    @include('dashboard.modals.agent-request-info')
                                    @include('dashboard.modals.agent-request-destroy')
                                    @include('dashboard.modals.agent-request-restore')
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
        // Initialize DataTable with correct configuration
        var table = $('#multi-filter-select').DataTable({
            pageLength: 10
        });

        // Apply filter for all text inputs (Search by columns)
        $('#filter-row input').on('keyup change', function() {
            var colIndex = $(this).closest('th').index();
            table.column(colIndex).search(this.value).draw();
        });

        // Apply filter for the Address dropdown (column 3 is for Address)
        $('#filter-address').on('change', function() {
            var addressValue = $(this).val();
            table.column(3).search(addressValue, true, false).draw();
        });

        // Apply filter for the Status dropdown (column 4 is for Status)
        $('#filter-status').on('change', function() {
            var statusValue = $(this).val();
            table.column(4).search(statusValue, true, false).draw();
        });
    });
</script>
@endpush