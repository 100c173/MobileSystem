@extends('dashboard.layouts.app')

@section('title')
{{ $mobile->name }} Description
@endsection

@include('dashboard.components.alerts')
@section('content')
<div class="page-inner">

        @if(empty($description))
            <a href="{{route('admin.create_description',$mobile->id)}}">
                <button class="fancy-btn btn-success" style="width: 180px;"><i class="fas fa-plus"></i> Add description</button>
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
                            <img style="max-height: 350px; max-width:100%" class="card-img-top w-100" src="{{asset($mobile->primaryImage->image_url)}}"  >
                        @else
                            <img style="max-height: 350px; max-width:100%" class="card-img-top w-100" src="{{asset('uploads/defaultImages/default_mobile.webp')}}"  >
                        @endif
                    
                        <div class="card-body">
                            <a href="{{route('admin.images',$mobile->id)}}">
                                <button class="fancy-btn btn-view" style="width: 100%;" ><i class="fa fa-eye me-1"></i>See More Pictures<i class="fe fe-arrow-right ml-1"></i></button>
                            </a>
                        </div>
                    </div>   

                <!-- div 2 -->
                <div class="col-xl-4">
                    <div class="card custom-card" style="width: 100%; min-width: 900px; margin: auto; box-shadow: 0 4px 10px rgba(0,0,0,0.15); border-radius: 15px;">
                    <h4 class="card-title text-center font-weight-bold" style="font-size: 1.5rem; color: #4a00e0;padding: 8px 0">
                        Description :
                    </h4>

                    <div class="card-body">
                        <div style="padding-left: 20px;">
                            <ul class="list-group">
                                <li class="list-group-item pb-4 "><strong>BRAND :</strong>{{$mobile->brand->name}}</li>
                                <li class="list-group-item pb-4"><strong>OS :</strong>{{$mobile->operatingSystem->name}}</li>
                                <li class="list-group-item pb-4"><strong>DESIGN DIMENSIONS :</strong>{{$description->design_dimensions}}</li>
                                <li class="list-group-item pb-4"><strong>DISPLAY :</strong>{{$description->display}}</li>
                                <li class="list-group-item pb-4"><strong>PERFORMANCE CPU :</strong>{{$description->performance_cpu}}</li>
                                <li class="list-group-item pb-4"><strong>STORAGE DESC :</strong>{{$description->storage_desc}}</li>
                                <li class="list-group-item pb-4"><strong>CONNECTIVITY :</strong>{{$description->connectivity_desc}}</li>
                                <li class="list-group-item pb-4"><strong>BATTERY DESC :</strong>{{$description->battery_desc}}</li>
                                <li class="list-group-item pb-4"><strong>EXTRA FEATURES :</strong>{{$description->extra_features}}</li>
                                <li class="list-group-item pb-4"><strong>SECURITY PRIVACY  :</strong>{{$description->security_privacy}}</li>
                                <li class="list-group-item pb-4"><strong>PROS :</strong>{{$description->pros}}</li>
                                <li class="list-group-item pb-4"><strong>CONS :</strong>{{$description->cons}}</li>
                            </ul>
                            <div style="padding-left:600px;padding-top:10px">
                                <a href="{{route('admin.mobileDescriptions.edit',$description->id) }}">
                                    <button type="button" class="fancy-btn btn-update" >
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
