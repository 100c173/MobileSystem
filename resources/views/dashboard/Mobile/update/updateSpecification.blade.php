@extends('dashboard.layouts.app')

@section('title')
{{ $specification->mobile->name }} Specifications
@endsection

@include('dashboard.components.alerts')
@section('content')
<div class="page-inner">
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow">
                <div class="card-header bg-primary text-white">
                    <h4 class="card-title m-0 d-flex align-items-center">
                        <i class="fas fa-mobile-alt me-2"></i>
                        Edit {{ $specification->mobile->name }} Specifications
                    </h4>
                </div>

                <div class="card-body">
                    <form action="{{route('admin.mobileSpcifications.update',$specification->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('put')

                        <input type="hidden" name="mobile_id" value="{{ $specification->mobile_id }}">

                        <div class="row">
                            <!-- Basic Specifications -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Processor (CPU)</label>
                                    <input type="text" class="form-control" name="cpu" value="{{ $specification->cpu }}" required>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Processor (GPU)</label>
                                    <input type="text" class="form-control" name="gpu" value="{{ $specification->gpu }}" required>
                                </div>

                                <div class="form-group">
                                    <label class="form-label">RAM</label>
                                    <input type="text" class="form-control" name="ram" value="{{ $specification->ram }}" required>
                                </div>

                                <div class="form-group">
                                    <label class="form-label">Storage Options</label>
                                    <div id="storage-container">
                                        @php 
                                            $storages = is_array($specification->storage) ? 
                                                $specification->storage : 
                                                json_decode($specification->storage, true) ?? [];
                                        @endphp
                                        @foreach($storages as $key => $value)
                                        <div class="input-group mb-2 storage-field">
                                            <input type="text" class="form-control" name="storage[{{ $key }}]" placeholder="Storage value" value="{{ $value }}">
                                            <button type="button" class="btn btn-danger remove-field"><i class="fas fa-times"></i></button>
                                        </div>
                                        @endforeach
                                    </div>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="new-storage-key" placeholder="Storage type">
                                        <input type="text" class="form-control" id="new-storage-value" placeholder="Storage value">
                                        <button type="button" class="btn btn-outline-primary" id="add-storage">
                                            <i class="fas fa-plus"></i> Add
                                        </button>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="form-label">Screen</label>
                                    <input type="text" class="form-control" name="screen" value="{{ $specification->screen }}" required>
                                </div>
                            </div>

                            <!-- Advanced Specifications -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Camera Features</label>
                                    <div id="camera-container">
                                        @php 
                                            $cameras = is_array($specification->camera) ? 
                                                $specification->camera : 
                                                json_decode($specification->camera, true) ?? [];
                                        @endphp
                                        @foreach($cameras as $key => $value)
                                        <div class="input-group mb-2 camera-field">
                                            <input type="text" class="form-control" name="camera[{{ $key }}]" placeholder="Camera specs" value="{{ $value }}">
                                            <button type="button" class="btn btn-danger remove-field"><i class="fas fa-times"></i></button>
                                        </div>
                                        @endforeach
                                    </div>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="new-camera-key" placeholder="Camera type">
                                        <input type="text" class="form-control" id="new-camera-value" placeholder="Camera specs">
                                        <button type="button" class="btn btn-outline-primary" id="add-camera">
                                            <i class="fas fa-plus"></i> Add
                                        </button>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="form-label">Battery</label>
                                    <div id="battery-container">
                                        @php 
                                            $batteries = is_array($specification->battery) ? 
                                                $specification->battery : 
                                                json_decode($specification->battery, true) ?? [];
                                        @endphp
                                        @foreach($batteries as $key => $value)
                                        <div class="input-group mb-2 battery-field">
                                            <input type="text" class="form-control" name="battery[{{ $key }}]" placeholder="Battery value" value="{{ $value }}">
                                            <button type="button" class="btn btn-danger remove-field"><i class="fas fa-times"></i></button>
                                        </div>
                                        @endforeach
                                    </div>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="new-battery-key" placeholder="Battery feature">
                                        <input type="text" class="form-control" id="new-battery-value" placeholder="Battery value">
                                        <button type="button" class="btn btn-outline-primary" id="add-battery">
                                            <i class="fas fa-plus"></i> Add
                                        </button>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="form-label">Connectivity</label>
                                    <div id="connectivity-container">
                                        @php 
                                            $connectivities = is_array($specification->connectivity) ? 
                                                $specification->connectivity : 
                                                json_decode($specification->connectivity, true) ?? [];
                                        @endphp
                                        @foreach($connectivities as $key => $value)
                                        <div class="input-group mb-2 connectivity-field">
                                            <input type="text" class="form-control" name="connectivity[{{ $key }}]" placeholder="Connectivity value" value="{{ $value }}">
                                            <button type="button" class="btn btn-danger remove-field"><i class="fas fa-times"></i></button>
                                        </div>
                                        @endforeach
                                    </div>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="new-connectivity-key" placeholder="Connectivity type">
                                        <input type="text" class="form-control" id="new-connectivity-value" placeholder="Connectivity value">
                                        <button type="button" class="btn btn-outline-primary" id="add-connectivity">
                                            <i class="fas fa-plus"></i> Add
                                        </button>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="form-label">Security Features</label>
                                    <div id="security-container">
                                        @php 
                                            $securities = is_array($specification->security_features) ? 
                                                $specification->security_features : 
                                                json_decode($specification->security_features, true) ?? [];
                                        @endphp
                                        @foreach($securities as $key => $value)
                                        <div class="input-group mb-2 security-field">
                                            <input type="text" class="form-control" name="security_features[{{ $key }}]" placeholder="Security value" value="{{ $value }}">
                                            <button type="button" class="btn btn-danger remove-field"><i class="fas fa-times"></i></button>
                                        </div>
                                        @endforeach
                                    </div>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="new-security-key" placeholder="Security feature">
                                        <input type="text" class="form-control" id="new-security-value" placeholder="Security value">
                                        <button type="button" class="btn btn-outline-primary" id="add-security">
                                            <i class="fas fa-plus"></i> Add
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card-footer text-right">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save me-1"></i> Save Changes
                            </button>
                            <a href="{{ url()->previous() }}" class="btn btn-outline-secondary">
                                <i class="fas fa-times me-1"></i> Cancel
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    $(document).ready(function() {
        // Add storage field
        $('#add-storage').click(function() {
            const key = $('#new-storage-key').val();
            const value = $('#new-storage-value').val();
            if (key && value) {
                $('#storage-container').append(`
                    <div class="input-group mb-2 storage-field">
                        <input type="text" class="form-control" name="storage[${key}]" value="${value}" readonly>
                        <input type="hidden" name="storage[${key}]" value="${value}">
                        <button type="button" class="btn btn-danger remove-field"><i class="fas fa-times"></i></button>
                    </div>
                `);
                $('#new-storage-key').val('');
                $('#new-storage-value').val('');
            }
        });

        // Add camera field
        $('#add-camera').click(function() {
            const key = $('#new-camera-key').val();
            const value = $('#new-camera-value').val();
            if (key && value) {
                $('#camera-container').append(`
                    <div class="input-group mb-2 camera-field">
                        <input type="text" class="form-control" name="camera[${key}]" value="${value}" readonly>
                        <input type="hidden" name="camera[${key}]" value="${value}">
                        <button type="button" class="btn btn-danger remove-field"><i class="fas fa-times"></i></button>
                    </div>
                `);
                $('#new-camera-key').val('');
                $('#new-camera-value').val('');
            }
        });

        // Add battery field
        $('#add-battery').click(function() {
            const key = $('#new-battery-key').val();
            const value = $('#new-battery-value').val();
            if (key && value) {
                $('#battery-container').append(`
                    <div class="input-group mb-2 battery-field">
                        <input type="text" class="form-control" name="battery[${key}]" value="${value}" readonly>
                        <input type="hidden" name="battery[${key}]" value="${value}">
                        <button type="button" class="btn btn-danger remove-field"><i class="fas fa-times"></i></button>
                    </div>
                `);
                $('#new-battery-key').val('');
                $('#new-battery-value').val('');
            }
        });

        // Add connectivity field
        $('#add-connectivity').click(function() {
            const key = $('#new-connectivity-key').val();
            const value = $('#new-connectivity-value').val();
            if (key && value) {
                $('#connectivity-container').append(`
                    <div class="input-group mb-2 connectivity-field">
                        <input type="text" class="form-control" name="connectivity[${key}]" value="${value}" readonly>
                        <input type="hidden" name="connectivity[${key}]" value="${value}">
                        <button type="button" class="btn btn-danger remove-field"><i class="fas fa-times"></i></button>
                    </div>
                `);
                $('#new-connectivity-key').val('');
                $('#new-connectivity-value').val('');
            }
        });

        // Add security field
        $('#add-security').click(function() {
            const key = $('#new-security-key').val();
            const value = $('#new-security-value').val();
            if (key && value) {
                $('#security-container').append(`
                    <div class="input-group mb-2 security-field">
                        <input type="text" class="form-control" name="security_features[${key}]" value="${value}" readonly>
                        <input type="hidden" name="security_features[${key}]" value="${value}">
                        <button type="button" class="btn btn-danger remove-field"><i class="fas fa-times"></i></button>
                    </div>
                `);
                $('#new-security-key').val('');
                $('#new-security-value').val('');
            }
        });

        // Remove field
        $(document).on('click', '.remove-field', function() {
            $(this).closest('.input-group').remove();
        });
    });
</script>
@endpush

<style>
    .form-group {
        margin-bottom: 1.5rem;
    }
    
    .form-label {
        font-weight: 600;
        color: #495057;
        margin-bottom: 0.5rem;
    }
    
    .input-group {
        box-shadow: 0 1px 3px rgba(0,0,0,0.1);
        border-radius: 4px;
    }
    
    .card {
        border: none;
        border-radius: 10px;
    }
    
    .card-header {
        border-radius: 10px 10px 0 0 !important;
    }
    
    .input-group.mb-2 {
        margin-bottom: 0.5rem !important;
    }
</style>