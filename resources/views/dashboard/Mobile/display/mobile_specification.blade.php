@extends('dashboard.layouts.app')

@section('title')
{{ $mobile->name }} Specification
@endsection

@include('dashboard.components.alerts')
@section('content')
<div class="page-inner">

    @if(empty($specification))
    <a href="">
        <button class="fancy-btn btn-success" style="width: 180px;"><i class="fas fa-plus"></i> Add specification</button>
    </a>
    @else
    <div style="display:flex;gap:20px">
        <!-- div 1 -->

        <div class="card custom-card col-md-4" style="box-shadow: 10px 10px 20px rgba(0,0,0,0.6); border-radius:20px;height:480px;margin-top:90px">
            <h4 class="card-title text-center font-weight-bold" style="font-size: 1.5rem; color: #4a00e0;padding: 8px 0">
                <i class="fas fa-mobile-alt me-2"></i>
                {{ $mobile->name }}
            </h4>
            @if($mobile->primaryImage)
            <img style="max-height: 350px; max-width:100%" class="card-img-top w-100" src="{{asset($mobile->primaryImage->image_url)}}">
            @else
            <img style="max-height: 350px; max-width:100%" class="card-img-top w-100" src="{{asset('uploads/defaultImages/default_mobile.webp')}}">
            @endif

            <div class="card-body">
                <a href="{{route('admin.images',$mobile->id)}}">
                    <button class="fancy-btn btn-view" style="width: 100%;"><i class="fa fa-eye me-1"></i>See More Pictures<i class="fe fe-arrow-right ml-1"></i></button>
                </a>
            </div>
        </div>

        <!-- div 2 -->
        <div class="col-xl-4">
            <div class="card custom-card" style="width: 100%; min-width: 900px; margin: auto; box-shadow: 0 4px px rgba(0,0,0,0.15); border-radius: 15px;">
                <h4 class="card-title text-center font-weight-bold" style="font-size: 1.5rem; color: #4a00e0;padding: 8px 0">
                    Specification :
                </h4>

                <div class="card-body">
                    <div style="padding-left: 20px;">
                        <ul class="list-group">
                            <li class="list-group-item pb-4 "><strong>BRAND :</strong>{{$mobile->brand->name}}</li>
                            <li class="list-group-item pb-4"><strong>OS :</strong>{{$mobile->operatingSystem->name}}</li>
                            <li class="list-group-item pb-4"><strong>CPU :</strong>{{$specification->cpu}}</li>
                            <li class="list-group-item pb-4"><strong>RAM :</strong>{{$specification->ram}}</li>
                            <li class="list-group-item pb-4">
                                @php $storages = $specification->storage; @endphp
                                <strong>STORAGE :</strong>
                                @if(isset($storages ))
                                @foreach($storages as $x)
                                <strong>{{$x}}</strong>
                                @endforeach
                                @endif
                            </li>
                            <li class="list-group-item pb-4"><strong>C10AMERA :</strong>{{$specification->camera}}</li>
                            <li class="list-group-item pb-4"><strong>SCREEN :</strong>{{$specification->screen}}</li>
                            <li class="list-group-item pb-4"><strong>BATTERY :</strong>{{$specification->battery}}</li>
                            <li class="list-group-item pb-4"><strong>CONNECTIVITY :</strong>{{$specification->connectivity}}</li>
                            <li class="list-group-item pb-4"><strong>SECURITY FEATURES :</strong>{{$specification->security_features}}</li>
                            <li class="list-group-item pb-4"><strong>ACTION :</strong>{{$specification->security_features}}</li>
                        </ul>
                        <div style="padding-left:600px;padding-top:10px">
                            <a href="{{ route('admin.mobileSpcifications.edit',$specification->id) }}">
                                <button type="button" class="fancy-btn btn-update">
                                    <i class="fa fa-pen me-1"></i> Update
                                </button>
                            </a>
                        </div>
                    </div>



                </div>
            </div>
        </div>
        <!-- end div2 -->
    </div>
    @endif


</div> <!-- /.page-inner -->
@endsection