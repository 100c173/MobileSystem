@extends('dashboard.layouts.app')
@section('title')
Agent Requests
@endsection

@include('dashboard.components.alerts')
@section('content')
<div class="page-inner">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            {!! Breadcrumbs::render('agent-requests') !!}
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
                         @php
                            $counter= 1;
                        @endphp

                        <tbody>
                            @foreach($agent_requests as $agent_request)
                            <tr>
                                <td>{{ $counter++ }}</td>
                                <td>{{ $agent_request->user->name }}</td>
                                <td>{{ $agent_request->business_name }}</td>
                                <td>{{ $agent_request->address }}</td>
                                <td>
                                    <span class="text-warning">
                                        <i class="fas fa-clock"></i>
                                        {{$agent_request->status}}
                                    </span>
                                </td>
                                <td>
                                    <div class="btn-group" role="group" aria-label="Action Buttons">
                                        {{-- Action Icon --}}
                                        <button type="button" class="btn btn-outline-secondary btn-sm" data-bs-toggle="dropdown" aria-expanded="false" title="Take Action">
                                            <i class="fa fa-ellipsis-v"></i> <!-- Dropdown icon -->
                                        </button>

                                        <ul class="dropdown-menu" aria-labelledby="actionButton">
                                            {{-- View Action --}}
                                            <li>
                                                <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#detailsModal-{{ $agent_request->id }}">
                                                    <i class="fa fa-eye me-2"></i> View
                                                </a>
                                            </li>

                                            {{-- Approve Action --}}
                                            <li>
                                                <form method="POST" action="{{ route('agent-requests-accepte', $agent_request->id) }}">
                                                    @csrf
                                                    <button type="submit" class="dropdown-item">
                                                        <i class="fa fa-check me-2"></i> Approve
                                                    </button>
                                                </form>
                                            </li>

                                            {{-- Reject Action --}}
                                            <li>
                                                <!-- Reject Button -->
                                                <button type="button" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#rejectModal-{{ $agent_request->id }}">
                                                    <i class="fa fa-times me-2"></i> Reject
                                                </button>
                                            </li>
                                        </ul>
                                    </div>

                                    {{-- Modal for View --}}
                                    @include('dashboard.modals.agent-request-info')

                                    {{-- Modal for Rejected --}}
                                    @include('dashboard.modals.agent-request-rejected')
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
