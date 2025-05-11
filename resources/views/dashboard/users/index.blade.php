@extends('dashboard.layouts.app')
@section('title')
Users
@endsection

@section('content')
@include('dashboard.components.alerts')
<div class="page-inner">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            {!! Breadcrumbs::render('users.index')!!}
        </ol>
    </nav>
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title"><i class="fas fa-users"></i> Users control panel</h4>
            </div>

            <div class="card-body">

                <div class="table-responsive">

                    <table id="multi-filter-select" class="display table table-striped table-hover">
                        <thead>
                            <!-- filter row will be moved here by JS -->
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Role</th>
                                <th>Email</th>
                                <th>Purchase value</th>
                                <th>Added date</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($users as $user)
                            <tr>
                                <td>{{$user->id}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->getRoleNames()->first()}}</td>
                                <td>{{$user->email}}</td>
                                <td>$1000</td>
                                <td>{{$user->created_at->format('Y-m-d')}}</td>
                                <td>
                                    @if($user->is_permanently_banned)
                                    <span class="badge bg-danger">Banned</span>
                                    @elseif($user->banned_until)
                                    <span class="badge bg-warning">Banned (remains {{$user->remainingBanHours()}} hours)</span>
                                    @else
                                    <span class="badge bg-success">Active</span>
                                    @endif
                                </td>
                                <td>
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
                                    <a href="{{ route('users.show', $user->id) }}" class="btn btn-sm btn-info">Show</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div> <!-- table-responsive -->
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    $(document).ready(function() {
        var table = $('#multi-filter-select').DataTable({
            pageLength: 6,
            initComplete: function() {
                var api = this.api();

                // نقل صف الفلترة من tfoot إلى thead
                var $footerRow = $('#multi-filter-select tfoot tr');
                $footerRow.clone(true).prependTo('#multi-filter-select thead');

                api.columns().every(function(index) {
                    if (index === 7) return; // تجاهل عمود Action

                    var column = this;
                    var select = $('<select class="form-select"><option value=""></option></select>')
                        .appendTo($('#multi-filter-select thead tr:eq(0) th').eq(index).empty())
                        .on('change', function() {
                            var val = $.fn.dataTable.util.escapeRegex($(this).val());
                            column.search(val ? '^' + val + '$' : '', true, false).draw();
                        });

                    column.data().unique().sort().each(function(d) {
                        // تنظيف البيانات من HTML (في حال وُجد)
                        d = $('<div>').html(d).text();
                        select.append('<option value="' + d + '">' + d + '</option>');
                    });
                });
            }
        });
    });
</script>
@endpush