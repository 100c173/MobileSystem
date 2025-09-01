@extends('dashboard.layouts.app')
@section('title')
Customer Devices For Review
@endsection

@include('dashboard.components.alerts')
@section('content')
<div class="card">
    <div class="card-header">
        <h4 class="card-title">File Conversion Requests</h4>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead class="table-light">
                    <tr>
                        <th>User</th>
                        <th>email</th>
                        <th>Submitted At</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($customer_devices as $device)
                    <tr>
                        <td>{{$device->user->name}}</td>
                        <td>{{$device->user->email}}</td>
                        <td>{{$device->created_at}}</td>
                        <td>
                            @if($device->status == 'pending')
                            <span class="badge bg-warning text-dark"><strong>{{$device->status}}</strong></span>
                            @endif
                            @if($device->status == 'reject')
                            <span class="badge bg-danger text-dark"><strong>{{$device->status}}</strong></span>
                            @endif
                            @if($device->status == 'approve')
                            <span class="badge bg-success text-dark"><strong>{{$device->status}}</strong></span>
                            @endif
                        </td>
                        <td>
                            <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#detailsModal">
                                <i class="fas fa-eye"></i> View
                            </button>
                            <div class="btn-group">
                                <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle" data-bs-toggle="dropdown">
                                    Change Status
                                </button>
                                <ul class="dropdown-menu">
                                    <li>
                                        <form action="{{ route('customer_devices.approve', $device->id) }}" method="post">
                                            @csrf
                                            <button type="submit" class="dropdown-item text-success">
                                                <i class="bi bi-check-circle me-2"></i> Approve
                                            </button>
                                        </form>
                                    </li>
                                    <li>
                                        <form action="{{ route('customer_devices.reject', $device->id) }}" method="post">
                                            @csrf
                                            <button type="submit" class="dropdown-item text-danger">
                                                <i class="bi bi-x-circle me-2"></i> Reject
                                            </button>
                                        </form>
                                    </li>
                                </ul>

                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="detailsModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Device Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <dl class="row mb-0">
                            <dt class="col-sm-4">Brand:</dt>
                            <dd class="col-sm-8">{{$device->brand->name}}</dd>

                            <dt class="col-sm-4">OS:</dt>
                            <dd class="col-sm-8">{{$device->operatingSystem->name}}</dd>

                            <dt class="col-sm-4">Model:</dt>
                            <dd class="col-sm-8">{{$device->model}}</dd>

                            <dt class="col-sm-4">Price:</dt>
                            <dd class="col-sm-8"><strong>$ {{$device->price}}</strong></dd>
                        </dl>
                    </div>
                    <div class="col-md-6">
                        <dl class="row mb-0">

                            <dt class="col-sm-4">Storage:</dt>
                            <dd class="col-sm-8">{{$device->storage}}</dd>

                            <dt class="col-sm-4">Condition:</dt>
                            <dd class="col-sm-8">{{$device->condition}}</dd>
                        </dl>
                    </div>
                    <div class="col-12 mt-3">
                        <label class="form-label">Device Image:</label>
                        <div class="text-center">
                            @foreach($device->images as $image)
                            <img src="{{asset($image->path)}}" class="img-fluid rounded" style="max-height: 300px;">
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    $(document).ready(function() {
        $('.status-change').click(function(e) {
            e.preventDefault();
            const newStatus = $(this).data('status');
            const row = $(this).closest('tr');
            const badge = row.find('.badge');

            // Update badge appearance
            badge.removeClass('bg-warning bg-success bg-danger text-dark');

            if (newStatus === 'approved') {
                badge.addClass('bg-success').text('Approved');
            } else if (newStatus === 'rejected') {
                badge.addClass('bg-danger').text('Rejected');
            } else {
                badge.addClass('bg-warning text-dark').text('Pending');
            }

            // Here you would typically add AJAX call to update status
            // $.ajax({...});

            // Show notification
            $.notify({
                icon: 'fas fa-check',
                title: 'Success!',
                message: 'Status updated successfully'
            }, {
                type: 'success',
                placement: {
                    from: "top",
                    align: "right"
                },
                time: 1000
            });
        });
    });
</script>
@endpush