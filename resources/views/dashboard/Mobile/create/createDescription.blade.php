@extends('dashboard.layouts.app')

@section('title')
Mobile Descriptions
@endsection

@include('dashboard.components.alerts')
@section('content')
<div class="page-inner">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header" style="background-color: #2c3e50;">
                    <div class="d-flex align-items-center">
                        <i class="fas fa-mobile-alt fa-2x text-white mr-3"></i>
                        <h4 class="card-title text-white m-0">Add Mobile Descriptions</h4>
                    </div>
                </div>

                <div class="card-body" style="background-color: #f8f9fa;">
                    <form action="{{route('admin.mobileDescriptions.store')}}" method="POST" enctype="multipart/form-data" id="mobileForm">
                        @csrf

                        <div class="row">
                            <!-- Design Section -->
                            <div class="col-md-6">
                                <div class="card mb-4" style="border-color: #e0e0e0;">
                                    <div class="card-header" style="background-color: #3498db; color: white;">
                                        <h5 class="card-title m-0"><i class="fas fa-ruler-combined mr-2"></i>Design & Dimensions</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label style="color: #34495e;">Design Dimensions</label>
                                            <input type="text" class="form-control" name="design_dimensions" placeholder="e.g. 160.8 x 78.1 x 7.6 mm" required>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Display Section -->
                            <div class="col-md-6">
                                <div class="card mb-4" style="border-color: #e0e0e0;">
                                    <div class="card-header" style="background-color: #3498db; color: white;">
                                        <h5 class="card-title m-0"><i class="fas fa-tv mr-2"></i>Display Specifications</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label style="color: #34495e;">Display Type</label>
                                                    <input type="text" class="form-control" name="display[type]" placeholder="e.g. AMOLED" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label style="color: #34495e;">Size</label>
                                                    <input type="text" class="form-control" name="display[size]" placeholder="e.g. 6.7 inches" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label style="color: #34495e;">Resolution</label>
                                                    <input type="text" class="form-control" name="display[resolution]" placeholder="e.g. 1440 x 3200 pixels" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label style="color: #34495e;">Refresh Rate</label>
                                                    <input type="text" class="form-control" name="display[refresh_rate]" placeholder="e.g. 120Hz" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Performance Section -->
                        <div class="card mb-4" style="border-color: #e0e0e0;">
                            <div class="card-header" style="background-color: #2ecc71; color: white;">
                                <h5 class="card-title m-0"><i class="fas fa-tachometer-alt mr-2"></i>Performance</h5>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label style="color: #34495e;">CPU</label>
                                            <input type="text" class="form-control" name="performance_cpu" placeholder="e.g. Snapdragon 888" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label style="color: #34495e;">Storage Description</label>
                                            <input type="text" class="form-control" name="storage_desc" placeholder="e.g. 128GB, 8GB RAM" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Connectivity & Battery -->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="card mb-4" style="border-color: #e0e0e0;">
                                    <div class="card-header" style="background-color: #e74c3c; color: white;">
                                        <h5 class="card-title m-0"><i class="fas fa-wifi mr-2"></i>Connectivity</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label style="color: #34495e;">Connectivity Description</label>
                                            <input type="text" class="form-control" name="connectivity_desc" placeholder="e.g. 5G, Wi-Fi 6, Bluetooth 5.2" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card mb-4" style="border-color: #e0e0e0;">
                                    <div class="card-header" style="background-color: #f39c12; color: white;">
                                        <h5 class="card-title m-0"><i class="fas fa-battery-full mr-2"></i>Battery</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label style="color: #34495e;">Battery Description</label>
                                            <input type="text" class="form-control" name="battery_desc" placeholder="e.g. 5000mAh, Fast charging 65W" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Features Section -->
                        <div class="card mb-4" style="border-color: #e0e0e0;">
                            <div class="card-header" style="background-color: #9b59b6; color: white;">
                                <h5 class="card-title m-0"><i class="fas fa-star mr-2"></i>Key Features</h5>
                            </div>
                            <div class="card-body">
                                <div id="features-container">
                                    <div class="form-group feature-group">
                                        <div class="input-group mb-2">
                                            <input type="text" class="form-control" name="key_features[]" placeholder="Enter key feature" required>
                                            <div class="input-group-append">
                                                <button class="btn btn-success add-feature-btn" type="button" style="background-color: #27ae60;">
                                                    <i class="fas fa-plus"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Security Section -->
                        <div class="card mb-4" style="border-color: #e0e0e0;">
                            <div class="card-header" style="background-color: #1abc9c; color: white;">
                                <h5 class="card-title m-0"><i class="fas fa-shield-alt mr-2"></i>Security</h5>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label style="color: #34495e;">Security & Privacy</label>
                                    <input type="text" class="form-control" name="security_privacy" placeholder="e.g. In-display fingerprint, Face recognition" required>
                                </div>
                                
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="card" style="border-color: #e0e0e0;">
                                            <div class="card-header" style="background-color: #27ae60; color: white;">
                                                <h6 class="card-title m-0">Pros</h6>
                                            </div>
                                            <div class="card-body">
                                                <div id="pros-container">
                                                    <div class="form-group pros-group mb-2">
                                                        <div class="input-group">
                                                            <input type="text" class="form-control" name="pros[]" placeholder="Enter security advantage" required>
                                                            <div class="input-group-append">
                                                                <button class="btn btn-success add-pros-btn" type="button" style="background-color: #27ae60;">
                                                                    <i class="fas fa-plus"></i>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="card" style="border-color: #e0e0e0;">
                                            <div class="card-header" style="background-color: #e74c3c; color: white;">
                                                <h6 class="card-title m-0">Cons</h6>
                                            </div>
                                            <div class="card-body">
                                                <div id="cons-container">
                                                    <div class="form-group cons-group mb-2">
                                                        <div class="input-group">
                                                            <input type="text" class="form-control" name="cons[]" placeholder="Enter security disadvantage" required>
                                                            <div class="input-group-append">
                                                                <button class="btn btn-success add-cons-btn" type="button" style="background-color: #27ae60;">
                                                                    <i class="fas fa-plus"></i>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group text-center mt-4">
                            <button type="submit" class="btn btn-primary btn-lg px-5" style="background-color: #2980b9; border-color: #2980b9;">
                                <i class="fas fa-save mr-2"></i> Save Descriptions
                            </button>
                            <button type="button" class="btn btn-outline-secondary btn-lg px-5 ml-3" style="color: #7f8c8d; border-color: #7f8c8d;">
                                <i class="fas fa-times mr-2"></i> Cancel
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
    body {
        background-color: #ecf0f1;
    }
    .card {
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        transition: all 0.3s ease;
    }
    .card:hover {
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
    }
    .form-control {
        border: 1px solid #ddd;
        border-radius: 4px;
        padding: 10px 15px;
    }
    .form-control:focus {
        border-color: #3498db;
        box-shadow: 0 0 0 0.2rem rgba(52, 152, 219, 0.25);
    }
    label {
        font-weight: 600;
        margin-bottom: 8px;
    }
    .feature-group:not(:first-child),
    .pros-group:not(:first-child),
    .cons-group:not(:first-child) {
        margin-top: 10px;
    }
    .add-feature-btn,
    .add-pros-btn,
    .add-cons-btn {
        border-top-left-radius: 0;
        border-bottom-left-radius: 0;
    }
    .btn-primary:hover {
        background-color: #3498db;
        border-color: #3498db;
    }
    .input-group-append button:hover {
        opacity: 0.9;
    }
</style>
@endpush

@push('scripts')
<script>
    $(document).ready(function() {
        // Add feature field
        $(document).on('click', '.add-feature-btn', function() {
            const newField = `
                <div class="form-group feature-group">
                    <div class="input-group mb-2">
                        <input type="text" class="form-control" name="key_features[]" placeholder="Enter key feature" required>
                        <div class="input-group-append">
                            <button class="btn btn-danger remove-field-btn" type="button" style="background-color: #e74c3c;">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                </div>
            `;
            $('#features-container').append(newField);
        });

        // Add pros field
        $(document).on('click', '.add-pros-btn', function() {
            const newField = `
                <div class="form-group pros-group">
                    <div class="input-group mb-2">
                        <input type="text" class="form-control" name="pros[]" placeholder="Enter security advantage" required>
                        <div class="input-group-append">
                            <button class="btn btn-danger remove-field-btn" type="button" style="background-color: #e74c3c;">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                </div>
            `;
            $('#pros-container').append(newField);
        });

        // Add cons field
        $(document).on('click', '.add-cons-btn', function() {
            const newField = `
                <div class="form-group cons-group">
                    <div class="input-group mb-2">
                        <input type="text" class="form-control" name="cons[]" placeholder="Enter security disadvantage" required>
                        <div class="input-group-append">
                            <button class="btn btn-danger remove-field-btn" type="button" style="background-color: #e74c3c;">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                </div>
            `;
            $('#cons-container').append(newField);
        });

        // Remove field
        $(document).on('click', '.remove-field-btn', function() {
            $(this).closest('.form-group').remove();
        });

        // Form validation
        $('#mobileForm').validate({
            errorElement: 'span',
            errorPlacement: function (error, element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight: function (element, errorClass, validClass) {
                $(element).addClass('is-invalid');
            },
            unhighlight: function (element, errorClass, validClass) {
                $(element).removeClass('is-invalid');
            }
        });
    });
</script>
@endpush