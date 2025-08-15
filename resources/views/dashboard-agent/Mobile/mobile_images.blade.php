@extends('dashboard-agent.layouts.app')

@section('title')
{{ $mobile->name }} Images
@endsection


@section('content')
@include('dashboard-agent.components.alerts')
<div class="page-inner">
    <div style="display:flex;justify-content:space-between; margin-bottom:10px">
       @can('addImages',$mobile)
        <button type="button" class="fancy-btn btn-success" data-bs-toggle="modal" data-bs-target="#detailsModalAddImage-{{$mobile->id}}" title="Take Action">
            <i class="fas fa-plus"></i> Add Photo
        </button>
        @endcan
    </div>
    <div class="row">
        @if(!$images->isEmpty())
            @foreach ($images as $image )
                <div class="col-xl-4 col-md-4" style="border-radius: 25px;">
                    <div class="card custom-card text-center">
                        <img class="card-img-top w-100" src="{{asset($image->url)}}" alt="{{$image->caption}}" style="width : 250px;height:300px">
                        <div class="card-body">
                            <h2 class="card-title">{{$mobile->name }}</h2>
                            <p class="card-text">{{$image->caption}}</p>
                            @can('imageAction',$mobile)
                                <button type="button" class="fancy-btn btn-delete" data-bs-toggle="modal" data-bs-target="#detailsModalDeleteImage-{{$image->id}}" title="Take Action">
                                    <i class="fa fa-trash me-1"></i> Delete
                                </button>


                                @if($image->is_primary)
                                <a href="{{ route('agent.make_image_unEssential',$image->id) }}">
                                    <button type="button" class="fancy-btn btn-update ">
                                        <i class="far fa-star"></i> Un essential
                                    </button>
                                </a>
                                @else
                                <a href="{{ route('agent.make_image_essential',[$image->id,$mobile->id]) }}">
                                    <button type="button" class="fancy-btn btn-success ">
                                        <i class="fas fa-star"></i> Essential
                                    </button>
                                </a>

                                @endif
                             @endcan

                        </div>
                    </div>
                </div>
            @include('dashboard.modals.destroyMobileImage')
            @endforeach

        @endif
        @include('dashboard-agent.modals.addImage')


    </div>


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
