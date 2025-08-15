@extends('dashboard.layouts.app')

@section('title')
{{ $description->mobile->name }} Description
@endsection

@include('dashboard.components.alerts')
@section('content')
<div class="page-inner">
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow">
                <div class="card-header bg-primary text-white">
                    <h4 class="card-title m-0 d-flex align-items-center">
                        <i class="fas fa-align-left me-2"></i>
                        Edit {{ $description->mobile->name }} Description
                    </h4>
                </div>

                <div class="card-body">
                    <form action="{{route('admin.mobileDescriptions.update',$description->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('put')

                        <input type="hidden" name="mobile_id" value="{{ $description->mobile_id }}">

                        <div class="row">
                            <!-- Left Column -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Design & Dimensions</label>
                                    <input type="text" class="form-control" name="design_dimensions" value="{{ $description->design_dimensions }}" required>
                                </div>

                                <div class="form-group">
                                    <label class="form-label">Display Features</label>
                                    <div id="display-container">
                                        @php 
                                            $display = is_array($description->display) ? 
                                                $description->display : 
                                                json_decode($description->display, true) ?? [];
                                        @endphp
                                        @foreach($display as $key => $value)
                                        <div class="input-group mb-2 display-field">
                                            <input type="text" class="form-control" name="display[{{ $key }}]" value="{{ $value }}">
                                            <button type="button" class="btn btn-danger remove-field"><i class="fas fa-times"></i></button>
                                        </div>
                                        @endforeach
                                    </div>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="new-display-key" placeholder="Feature name">
                                        <input type="text" class="form-control" id="new-display-value" placeholder="Feature value">
                                        <button type="button" class="btn btn-outline-primary" id="add-display">
                                            <i class="fas fa-plus"></i> Add
                                        </button>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="form-label">Performance (CPU)</label>
                                    <input type="text" class="form-control" name="performance_cpu" value="{{ $description->performance_cpu }}" required>
                                </div>

                                <div class="form-group">
                                    <label class="form-label">Storage Description</label>
                                    <input type="text" class="form-control" name="storage_desc" value="{{ $description->storage_desc }}" required>
                                </div>
                            </div>

                            <!-- Right Column -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Connectivity Description</label>
                                    <input type="text" class="form-control" name="connectivity_desc" value="{{ $description->connectivity_desc }}" required>
                                </div>

                                <div class="form-group">
                                    <label class="form-label">Battery Description</label>
                                    <input type="text" class="form-control" name="battery_desc" value="{{ $description->battery_desc }}" required>
                                </div>

                                <div class="form-group">
                                    <label class="form-label">Extra Features</label>
                                    <div id="features-container">
                                        @php 
                                            $features = is_array($description->extra_features) ? 
                                                $description->extra_features : 
                                                json_decode($description->extra_features, true) ?? [];
                                        @endphp
                                        @foreach($features as $key => $value)
                                        <div class="input-group mb-2 feature-field">
                                            <input type="text" class="form-control" name="extra_features[{{ $key }}]" value="{{ $value }}">
                                            <button type="button" class="btn btn-danger remove-field"><i class="fas fa-times"></i></button>
                                        </div>
                                        @endforeach
                                    </div>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="new-feature-key" placeholder="Feature name">
                                        <input type="text" class="form-control" id="new-feature-value" placeholder="Feature value">
                                        <button type="button" class="btn btn-outline-primary" id="add-feature">
                                            <i class="fas fa-plus"></i> Add
                                        </button>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="form-label">Security & Privacy</label>
                                    <input type="text" class="form-control" name="security_privacy" value="{{ $description->security_privacy }}" required>
                                </div>
                            </div>
                        </div>

                        <!-- Pros & Cons Section -->
                        <div class="row mt-3">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label text-success">
                                        <i class="fas fa-check-circle me-1"></i> Pros
                                    </label>
                                    <div id="pros-container">
                                        @php 
                                            $pros = is_array($description->pros) ? 
                                                $description->pros : 
                                                json_decode($description->pros, true) ?? [];
                                        @endphp
                                        @foreach($pros as $index => $pro)
                                        <div class="input-group mb-2 pros-field">
                                            <input type="text" class="form-control" name="pros[]" value="{{ $pro }}">
                                            <button type="button" class="btn btn-danger remove-field"><i class="fas fa-times"></i></button>
                                        </div>
                                        @endforeach
                                    </div>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="new-pros-value" placeholder="Add new pro">
                                        <button type="button" class="btn btn-outline-success" id="add-pros">
                                            <i class="fas fa-plus"></i> Add
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label text-danger">
                                        <i class="fas fa-times-circle me-1"></i> Cons
                                    </label>
                                    <div id="cons-container">
                                        @php 
                                            $cons = is_array($description->cons) ? 
                                                $description->cons : 
                                                json_decode($description->cons, true) ?? [];
                                        @endphp
                                        @foreach($cons as $index => $con)
                                        <div class="input-group mb-2 cons-field">
                                            <input type="text" class="form-control" name="cons[]" value="{{ $con }}">
                                            <button type="button" class="btn btn-danger remove-field"><i class="fas fa-times"></i></button>
                                        </div>
                                        @endforeach
                                    </div>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="new-cons-value" placeholder="Add new con">
                                        <button type="button" class="btn btn-outline-danger" id="add-cons">
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
        // Add display feature
        $('#add-display').click(function() {
            const key = $('#new-display-key').val();
            const value = $('#new-display-value').val();
            if (key && value) {
                $('#display-container').append(`
                    <div class="input-group mb-2 display-field">
                        <input type="text" class="form-control" name="display[${key}]" value="${value}" readonly>
                        <input type="hidden" name="display[${key}]" value="${value}">
                        <button type="button" class="btn btn-danger remove-field"><i class="fas fa-times"></i></button>
                    </div>
                `);
                $('#new-display-key').val('');
                $('#new-display-value').val('');
            }
        });

        // Add extra feature
        $('#add-feature').click(function() {
            const key = $('#new-feature-key').val();
            const value = $('#new-feature-value').val();
            if (key && value) {
                $('#features-container').append(`
                    <div class="input-group mb-2 feature-field">
                        <input type="text" class="form-control" name="extra_features[${key}]" value="${value}" readonly>
                        <input type="hidden" name="extra_features[${key}]" value="${value}">
                        <button type="button" class="btn btn-danger remove-field"><i class="fas fa-times"></i></button>
                    </div>
                `);
                $('#new-feature-key').val('');
                $('#new-feature-value').val('');
            }
        });

        // Add pro
        $('#add-pros').click(function() {
            const value = $('#new-pros-value').val();
            if (value) {
                $('#pros-container').append(`
                    <div class="input-group mb-2 pros-field">
                        <input type="text" class="form-control" name="pros[]" value="${value}">
                        <button type="button" class="btn btn-danger remove-field"><i class="fas fa-times"></i></button>
                    </div>
                `);
                $('#new-pros-value').val('');
            }
        });

        // Add con
        $('#add-cons').click(function() {
            const value = $('#new-cons-value').val();
            if (value) {
                $('#cons-container').append(`
                    <div class="input-group mb-2 cons-field">
                        <input type="text" class="form-control" name="cons[]" value="${value}">
                        <button type="button" class="btn btn-danger remove-field"><i class="fas fa-times"></i></button>
                    </div>
                `);
                $('#new-cons-value').val('');
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