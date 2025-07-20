@extends('dashboard-agent.layouts.app')

@section('title')
{{ $mobile->name }} Specification
@endsection

@include('dashboard-agent.components.alerts')
@section('content')
<div class="page-inner">

    @if(empty($specification))
    <div class="text-center py-5">
        <img src="{{asset('assets/img/no-data.svg')}}" alt="No specifications" style="height: 200px;" class="my-4">
        <h4 class="text-muted mb-4">No specifications available for this device</h4>
        <a href="" class="btn btn-primary btn-lg rounded-pill">
            <i class="fas fa-plus-circle"></i> Add Specifications
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
                    <img class="product-image img-fluid p-4" src="{{asset($mobile->primaryImage->image_url)}}" alt="{{$mobile->name}}">
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

        <!-- Specifications Card -->
        <div class="col-lg-8">
            <div class="card specs-card shadow">
                <div class="card-header bg-white border-bottom-0 pt-4">
                    <div class="d-flex justify-content-between align-items-center">
                        <h3 class="mb-0 text-primary font-weight-bold">
                            <i class="fas fa-list-ul me-2"></i> Technical Specifications
                        </h3>
                        @can('update',$mobile)
                        <a href="{{ route('admin.mobileSpcifications.edit',$specification->id) }}" class="btn btn-sm btn-outline-primary">
                            <i class="fas fa-edit me-1"></i> Edit
                        </a>
                        @endcan
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
                                <span class="spec-label">Processor:</span>
                                <span class="spec-value">{{$specification->cpu}}</span>
                            </div>
                            <div class="spec-item">
                                <span class="spec-label">RAM:</span>
                                <span class="spec-value">{{$specification->ram}}</span>
                            </div>
                        </div>

                        <div class="specs-group">
                            <div class="spec-item">
                                <span class="spec-label">Storage:</span>
                                <span class="spec-value">
                                    @php $storages = $specification->storage; @endphp
                                    @if(isset($storages))
                                    @foreach($storages as $y => $x )
                                    <span class="storage-option">{{$y}} ({{$x}})</span>
                                    @endforeach
                                    @endif
                                </span>
                            </div>
                        </div>

                        <div class="specs-group">
                            <div class="spec-item">
                                <span class="spec-label">Display:</span>
                                <span class="spec-value">{{$specification->screen}}</span>
                            </div>
                        </div>

                        <div class="specs-group">
                            <div class="spec-item">
                                <span class="spec-label">Camera:</span>
                                <span class="spec-value">
                                    @php $camera = $specification->camera; @endphp
                                    @if(isset($camera))
                                    @foreach($camera as $y => $x )
                                    <div class="camera-feature">{{$y}}: {{$x}}</div>
                                    @endforeach
                                    @endif
                                </span>
                            </div>
                        </div>

                        <div class="specs-group">
                            <div class="spec-item">
                                <span class="spec-label">Battery:</span>
                                <span class="spec-value">
                                    @php $battery = $specification->battery; @endphp
                                    @if(isset($battery))
                                    @foreach($battery as $y => $x )
                                    <div class="battery-feature">{{$y}}: {{$x}}</div>
                                    @endforeach
                                    @endif
                                </span>
                            </div>
                        </div>

                        <div class="specs-group">
                            <div class="spec-item">
                                <span class="spec-label">Connectivity:</span>
                                <span class="spec-value">
                                    @php $connectivity = $specification->connectivity; @endphp
                                    @if(isset($connectivity))
                                    @foreach($connectivity as $y => $x )
                                    <div class="connectivity-feature">{{$y}}: {{$x}}</div>
                                    @endforeach
                                    @endif
                                </span>
                            </div>
                        </div>

                        <div class="specs-group">
                            <div class="spec-item">
                                <span class="spec-label">Security Features:</span>
                                <span class="spec-value">
                                    @php $security_features = $specification->security_features; @endphp
                                    @if(isset($security_features))
                                    @foreach($security_features as $y => $x )
                                    <div class="security-feature">{{$y}}: {{$x}}</div>
                                    @endforeach
                                    @endif
                                </span>
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
        margin-bottom: 20px;
        padding-bottom: 15px;
        border-bottom: 1px solid #f0f0f0;
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
    }

    .storage-option {
        display: inline-block;
        background: #f5f5f5;
        padding: 3px 8px;
        border-radius: 4px;
        margin-right: 5px;
        margin-bottom: 5px;
    }

    .camera-feature,
    .battery-feature,
    .connectivity-feature,
    .security-feature {
        margin-bottom: 5px;
    }

    @media (max-width: 768px) {
        .spec-item {
            flex-direction: column;
        }

        .spec-label {
            margin-bottom: 5px;
        }
    }
</style>
@endsection