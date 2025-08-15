@extends('dashboard.layouts.app')

@section('title')
{{ $mobile->name }} Description
@endsection

@include('dashboard.components.alerts')
@section('content')
<div class="page-inner">

    @if(empty($description))
    <div class="text-center py-5">
        <img src="{{asset('assets/img/no-data.svg')}}" alt="No description" style="height: 200px;" class="my-4">
        <h4 class="text-muted mb-4">No description available for this device</h4>
        <a href="{{route('admin.create_description',$mobile->id)}}" class="btn btn-primary btn-lg rounded-pill">
            <i class="fas fa-plus-circle"></i> Add Description
        </a>
    </div>
    @else
    <div class="row">
        <!-- Mobile Image Card -->
        <div class="col-lg-4">
            <div class="card product-card shadow-lg">
                <div class="card-header bg-primary text-white text-center py-3">
                    <h4 class="mb-0 font-weight-bold">
                        <i class="fas fa-mobile-alt me-2"></i>
                        {{ $mobile->name }}
                    </h4>
                </div>
                <div class="card-body text-center p-0">
                    @if($mobile->primaryImage)
                    <img class="product-image img-fluid p-4" src="{{asset($mobile->primaryImage->url)}}" alt="{{ $mobile->name}}">
                    @else
                    <img class="product-image img-fluid p-4" src="{{asset('uploads/defaultImages/default_mobile.webp')}}" alt="Default Mobile">
                    @endif
                </div>
                <div class="card-footer bg-white text-center">
                    <a href="{{route('admin.images',$mobile->id)}}" class="btn btn-outline-primary btn-block">
                        <i class="fa fa-images me-2"></i> View Gallery
                    </a>
                </div>
            </div>
        </div>

        <!-- Description Card -->
        <div class="col-lg-8">
            <div class="card specs-card shadow">
                <div class="card-header bg-white border-bottom-0 pt-4">
                    <div class="d-flex justify-content-between align-items-center">
                        <h3 class="mb-0 text-primary font-weight-bold">
                            <i class="fas fa-align-left me-2"></i> Product Description
                        </h3>
                        <a href="{{route('admin.mobileDescriptions.edit',$description->id)}}" class="btn btn-sm btn-outline-primary">
                            <i class="fas fa-edit me-1"></i> Edit
                        </a>
                    </div>
                </div>
                
                <div class="card-body pt-0">
                    <div class="specs-container">
                        <div class="specs-group">
                            <div class="spec-item">
                                <span class="spec-label">Brand:</span>
                                <span class="spec-value">{{$mobile->brand->name}}</span>
                            </div>
                            <div class="spec-item">
                                <span class="spec-label">Operating System:</span>
                                <span class="spec-value">{{$mobile->operatingSystem->name}}</span>
                            </div>
                            <div class="spec-item">
                                <span class="spec-label">Design & Dimensions:</span>
                                <span class="spec-value">{{$description->design_dimensions}}</span>
                            </div>
                        </div>
                        
                        <div class="specs-group">
                            <h5 class="section-title">Display</h5>
                            <div class="spec-item">
                                <span class="spec-value">
                                    @php $display = $description->display; @endphp
                                    @if(isset($display))
                                    <ul class="feature-list">
                                        @foreach($display as $y => $x )
                                        <li><strong>{{$y}}:</strong> {{$x}}</li>
                                        @endforeach
                                    </ul>
                                    @endif
                                </span>
                            </div>
                        </div>
                        
                        <div class="specs-group">
                            <div class="spec-item">
                                <span class="spec-label">Performance (CPU):</span>
                                <span class="spec-value">{{$description->performance_cpu}}</span>
                            </div>
                            <div class="spec-item">
                                <span class="spec-label">Storage:</span>
                                <span class="spec-value">{{$description->storage_desc}}</span>
                            </div>
                        </div>
                        
                        <div class="specs-group">
                            <div class="spec-item">
                                <span class="spec-label">Connectivity:</span>
                                <span class="spec-value">{{$description->connectivity_desc}}</span>
                            </div>
                            <div class="spec-item">
                                <span class="spec-label">Battery:</span>
                                <span class="spec-value">{{$description->battery_desc}}</span>
                            </div>
                        </div>
                        
                        <div class="specs-group">
                            <h5 class="section-title">Key Features</h5>
                            <div class="spec-item">
                                <span class="spec-value">
                                    @php $key_features = $description->key_features; @endphp
                                    @if(isset($key_features))
                                    <ul class="feature-list">
                                        @foreach($key_features as $y => $x )
                                        <li><strong>{{$y}}:</strong> {{$x}}</li>
                                        @endforeach
                                    </ul>
                                    @endif
                                </span>
                            </div>
                        </div>
                        
                        <div class="specs-group">
                            <div class="spec-item">
                                <span class="spec-label">Security & Privacy:</span>
                                <span class="spec-value">{{$description->security_privacy}}</span>
                            </div>
                        </div>
                        
                        <div class="specs-group">
                            <div class="pros-cons-container">
                                <div class="pros-box">
                                    <h5 class="section-title text-success">
                                        <i class="fas fa-check-circle me-2"></i>Pros
                                    </h5>
                                    @php $pros = $description->pros; @endphp
                                    @if(isset($pros))
                                    <ul class="feature-list">
                                        @foreach($pros as $y => $x )
                                        <li>{{$x}}</li>
                                        @endforeach
                                    </ul>
                                    @endif
                                </div>
                                
                                <div class="cons-box">
                                    <h5 class="section-title text-danger">
                                        <i class="fas fa-times-circle me-2"></i>Cons
                                    </h5>
                                    @php $cons = $description->cons; @endphp
                                    @if(isset($cons))
                                    <ul class="feature-list">
                                        @foreach($cons as $y => $x )
                                        <li>{{$x}}</li>
                                        @endforeach
                                    </ul>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif

</div>

<style>
    .product-card {
        border-radius: 12px;
        overflow: hidden;
        border: none;
        margin-top: 30px;
    }
    
    .product-image {
        max-height: 350px;
        object-fit: contain;
    }
    
    .specs-card {
        border-radius: 12px;
        border: none;
    }
    
    .specs-container {
        padding: 0 20px;
    }
    
    .specs-group {
        margin-bottom: 25px;
        padding-bottom: 15px;
        border-bottom: 1px solid #f0f0f0;
    }
    
    .section-title {
        color: #4a4a4a;
        margin-bottom: 15px;
        font-weight: 600;
    }
    
    .spec-item {
        display: flex;
        margin-bottom: 10px;
    }
    
    .spec-label {
        font-weight: 600;
        color: #4a4a4a;
        min-width: 180px;
    }
    
    .spec-value {
        color: #333;
        flex: 1;
    }
    
    .feature-list {
        list-style-type: none;
        padding-left: 0;
        margin-bottom: 0;
    }
    
    .feature-list li {
        padding: 5px 0;
        border-bottom: 1px dashed #eee;
    }
    
    .feature-list li:last-child {
        border-bottom: none;
    }
    
    .pros-cons-container {
        display: flex;
        gap: 20px;
    }
    
    .pros-box, .cons-box {
        flex: 1;
        padding: 15px;
        border-radius: 8px;
    }
    
    .pros-box {
        background-color: rgba(40, 167, 69, 0.1);
    }
    
    .cons-box {
        background-color: rgba(220, 53, 69, 0.1);
    }
    
    @media (max-width: 768px) {
        .spec-item {
            flex-direction: column;
        }
        
        .spec-label {
            margin-bottom: 5px;
        }
        
        .pros-cons-container {
            flex-direction: column;
        }
    }
</style>
@endsection