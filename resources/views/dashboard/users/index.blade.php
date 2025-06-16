@extends('dashboard.layouts.app')
@section('title')
Users
@endsection

@section('content')
@include('dashboard.components.alerts')
<div class="page-inner">

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
                            </tr>
                        </tfoot>
                        @php
                        $counter= 1;
                        @endphp
                        <tbody>
                            @foreach ($users as $user)
                            <tr>
                                <td>{{$counter++}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->getRoleNames()->first()}}</td>
                                <td>{{$user->email}}</td>
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
                                    <a href="{{ route('users.unBlock', $user->id) }}">
                                        <button class="fancy-btn btn-success">UnBlock</button>
                                    </a>

                                    <form action="{{route('users.destroy',$user->id)}}" method="post" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="fancy-btn btn-delete">Delete</button>
                                    </form>
                                    @else
                                    <div class="btn-group">
                                        <button type="button" class="fancy-btn btn-delete dropdown-toggle" data-bs-toggle="dropdown">
                                            Block
                                        </button>
                                        <div class="dropdown-menu p-2 text-center" style="min-width: 180px; height:110px">
                                            <a href="{{ route('users.banFor24Hours', $user->id) }}">
                                                <button class="fancy-btn btn-update" style="width: 170px;">Block 24 hours</button>
                                            </a>
                                            <div style="height: 10px;"></div>
                                            <a href="{{ route('users.blockPermenently', $user->id) }}">
                                                <button class="fancy-btn btn-delete " style="width: 170px;"> Block Permanently</button>
                                            </a>
                                        </div>
                                    </div>
                                    @endif
                                    <a href="{{ route('users.show', $user->id) }}">
                                        <button class="fancy-btn btn-view ">Show</button>
                                    </a>


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