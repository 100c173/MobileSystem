@extends('dashboard.layouts.app')
@section('content')
<div class="page-inner">

    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table
                        id="add-row"
                        class="display table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>name</th>
                                <th>business_name</th>
                                <th>address</th>
                                <th>status</th>
                                <th style="width: 10%">Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th>name</th>
                                <th>business_name</th>
                                <th>address</th>
                                <th>status</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php $i = 0; ?>
                            @foreach($agent_requests as $agent_request)
                            <tr>
                                <?php $i++; ?>
                                <td>{{$i}}</td>
                                <td>{{$agent_request->user->name}}</td>
                                <td>{{$agent_request->business_name}}</td>
                                <td>{{$agent_request->address}}</td>
                                <td>{{$agent_request->status}}</td>
                                <td>
                                    <div class="btn-group" role="group" aria-label="Action Buttons">

                                        {{-- View Details --}}
                                        <button type="button"
                                            class="btn btn-outline-info btn-sm px-3"
                                            data-bs-toggle="modal"
                                            data-bs-target="#detailsModal-{{ $agent_request->id }}"
                                            title="View Details">
                                            <i class="fa fa-eye me-1"></i> View
                                        </button>

                                        {{-- Take Action --}}
                                        <button type="button"
                                            class="btn btn-outline-primary btn-sm px-3"
                                            data-bs-toggle="modal"
                                            data-bs-target="#actionModal-{{ $agent_request->id }}"
                                            title="Take Action">
                                            <i class="fa fa-bolt me-1"></i> Action
                                        </button>

                                    </div>

                                    {{-- Action Modal --}}
                                    @include('dashboard.modals.agent-request-action')

                                    {{-- View Modal --}}
                                    @include('dashboard.modals.agent-request-info')

                                </td>

                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection