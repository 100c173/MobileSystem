@extends('dashboard.layouts.app')
@section('title')
    Users
@endsection
@section('content')
<div class="page-inner">
    <!-- start -->
    @if(session()->has('success'))
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>
                {{session()->get('success')}}
            </div>
        @endif

    <div class="col-md-8 container " style="margin-top: 70px" >
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">User Information</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-5 col-md-4">
                        <div class="nav flex-column nav-pills nav-secondary nav-pills-no-bd" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                            <a class="nav-link active" id="v-pills-home-tab" data-bs-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true"><i class="fas fa-home"></i> Home</a>
                            <a class="nav-link" id="v-pills-profile-tab" data-bs-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">  <i class="fas fa-user-alt"></i>  Profile</a>
                            <a class="nav-link" id="v-pills-messages-tab" data-bs-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false"><i class="fas fa-charging-station"></i> Status</a>
                            <a class="nav-link" id="v-pills-purchases-tab" data-bs-toggle="pill" href="#v-pills-purchases" role="tab" aria-controls="v-pills-purchases" aria-selected="false"> <i class="fas fa-cart-arrow-down"></i>  Purchases</a>
                        </div>
                    </div>
                    <div class="col-7 col-md-8">
                        <div class="tab-content" id="v-pills-tabContent">
                            <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                                <p><strong>ID:</strong> {{ $user->id }}</p>
                                <p><strong>Name:</strong> {{ $user->name }}</p>
                                <p><strong>Email:</strong> {{ $user->email }}</p>

                            </div>
                            <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                                <p><strong>Email Verified:</strong>
                                    {{ $user->email_verified_at ? $user->email_verified_at->format('Y-m-d') : 'Not verified' }}
                                </p>
                                <p><strong>Created At:</strong> {{ $user->created_at->format('Y-m-d') }}</p>
                                <p><strong>Updated At:</strong> {{ $user->updated_at->format('Y-m-d') }}</p>

                            </div>
                            <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
                                <p><strong>Status:</strong>
                                    @if($user->is_permanently_banned)
                                        <span class="badge bg-danger">Permanently Banned</span>
                                    @elseif($user->banned_until)
                                        <span class="badge bg-warning">Temporarily Banned</span>
                                    @else
                                        <span class="badge bg-success">Active</span>
                                    @endif
                                </p>
                                @if($user->banned_until)
                                    <p><strong>Banned Until:</strong> {{ $user->banned_until }}</p>
     
                                @endif
                                <div style="margin-top:150px; margin-left: 450px" >
                                @if($user->is_permanently_banned || $user->banned_until)
                                        <a href="{{ route('users.unBlock', $user->id) }}" class="btn btn-sm btn-success">UnBlock</a>
                                        <form action="{{route('users.destroy',$user->id)}}" method="post" style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger"> SoftDelete</button>
                                        </form>
                                    @else
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-danger btn-sm dropdown-toggle" data-bs-toggle="dropdown">
                                                Block
                                            </button>
                                            <div class="dropdown-menu p-2 text-center" style="min-width: 180px;">
                                                <a href="{{ route('users.banFor24Hours', $user->id) }}" class="btn btn-warning btn-sm w-100 mb-1">Block 24 hours</a>
                                                <a href="{{ route('users.blockPermenently', $user->id) }}" class="btn btn-danger btn-sm w-100">Block Permanently</a>
                                            </div>
                                        </div>
                                    @endif
                                </div>

                            </div>
                            <div class="tab-pane fade" id="v-pills-purchases" role="tabpanel" aria-labelledby="v-pills-prpurchasesofile-tab">
                                <p><strong>purchases:</strong>
                                    purchases
                                </p>
                                

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- end -->
</div>

@endsection
@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<!-- For datatable -->
<script>
    $(document).ready(function() {
        var table = $('#multi-filter-select').DataTable({
            pageLength: 5, // x-2
            initComplete: function() {
                this.api()
                    .columns()
                    .every(function(index) {

                        if (index === 6) return; // x-1

                        var column = this;
                        var select = $('<select class="form-select"><option value=""></option></select>')
                            .appendTo($(column.footer()).empty())
                            .on('change', function() {
                                var val = $.fn.dataTable.util.escapeRegex($(this).val());
                                column.search(val ? '^' + val + '$' : '', true, false).draw();
                            });

                        column.data().unique().sort().each(function(d, j) {
                            select.append('<option value="' + d + '">' + d + '</option>');
                        });
                    });
            }
        });
    });
</script>

@endpush
