@extends('dashboard.layouts.app')

@section('title')
Mobile Specifications
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
                        <h4 class="card-title text-white m-0">Add Mobile Specification</h4>
                    </div>
                </div>

                <div class="card-body" style="background-color: #f8f9fa;">
                    <form action="{{route('admin.mobileSpcifications.store')}}" method="POST" enctype="multipart/form-data" id="mobileSpecForm">
                        @csrf

                        <!-- Performance Section -->
                        <div class="card mb-4" style="border-color: #e0e0e0;">
                            <div class="card-header" style="background-color: #2ecc71; color: white;">
                                <h5 class="card-title m-0"><i class="fas fa-microchip mr-2"></i>Performance</h5>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label style="color: #34495e;">CPU</label>
                                            <input type="text" class="form-control" name="cpu" placeholder="e.g. Snapdragon 8 Gen 2" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label style="color: #34495e;">GPU</label>
                                            <input type="text" class="form-control" name="gpu" placeholder="e.g. Adreno 740" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label style="color: #34495e;">RAM</label>
                                            <input type="text" class="form-control" name="ram" placeholder="e.g. 8GB LPDDR5" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Storage Section -->
                        <div class="card mb-4" style="border-color: #e0e0e0;">
                            <div class="card-header" style="background-color: #3498db; color: white;">
                                <h5 class="card-title m-0"><i class="fas fa-hdd mr-2"></i>Storage</h5>
                            </div>
                            <div class="card-body">
                                <div id="storage-group">
                                    <div class="form-group">
                                        <label style="color: #34495e;">Storage Options</label>
                                        <div class="input-group mb-2">
                                            <input type="text" class="form-control" name="storage[]" placeholder="e.g. 128GB UFS 3.1" required>
                                            <div class="input-group-append">
                                                <button class="btn btn-success add-storage-btn" type="button">
                                                    <i class="fas fa-plus"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Camera Section -->
                        <div class="card mb-4" style="border-color: #e0e0e0;">
                            <div class="card-header" style="background-color: #9b59b6; color: white;">
                                <h5 class="card-title m-0"><i class="fas fa-camera mr-2"></i>Camera</h5>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label style="color: #34495e;">Main Camera</label>
                                            <input type="text" class="form-control" name="camera[main]" placeholder="e.g. 50MP f/1.8" required>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label style="color: #34495e;">Ultrawide</label>
                                            <input type="text" class="form-control" name="camera[ultrawide]" placeholder="e.g. 12MP f/2.2" required>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label style="color: #34495e;">Telephoto</label>
                                            <input type="text" class="form-control" name="camera[telephoto]" placeholder="e.g. 10MP f/2.4" required>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label style="color: #34495e;">Front Camera</label>
                                            <input type="text" class="form-control" name="camera[front]" placeholder="e.g. 32MP f/2.0" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Display Section -->
                        <div class="card mb-4" style="border-color: #e0e0e0;">
                            <div class="card-header" style="background-color: #e67e22; color: white;">
                                <h5 class="card-title m-0"><i class="fas fa-tv mr-2"></i>Display</h5>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label style="color: #34495e;">Screen Specifications</label>
                                    <input type="text" class="form-control" name="screen" placeholder="e.g. 6.7\" AMOLED, 120Hz, HDR10+" required>
                                </div>
                            </div>
                        </div>

                        <!-- Battery Section -->
                        <div class="card mb-4" style="border-color: #e0e0e0;">
                            <div class="card-header" style="background-color: #f39c12; color: white;">
                                <h5 class="card-title m-0"><i class="fas fa-battery-full mr-2"></i>Battery</h5>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label style="color: #34495e;">Capacity</label>
                                            <input type="text" class="form-control" name="battery[capacity]" placeholder="e.g. 5000mAh" required>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label style="color: #34495e;">Wired Charging</label>
                                            <input type="text" class="form-control" name="battery[wired_charging]" placeholder="e.g. 65W" required>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label style="color: #34495e;">Wireless</label>
                                            <input type="text" class="form-control" name="battery[wireless]" placeholder="e.g. 30W" required>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label style="color: #34495e;">Reverse Wireless</label>
                                            <input type="text" class="form-control" name="battery[reverse_wireless]" placeholder="e.g. 10W" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Connectivity Section -->
                        <div class="card mb-4" style="border-color: #e0e0e0;">
                            <div class="card-header" style="background-color: #3498db; color: white;">
                                <h5 class="card-title m-0"><i class="fas fa-wifi mr-2"></i>Connectivity</h5>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label style="color: #34495e;">Network</label>
                                            <input type="text" class="form-control" name="connectivity[network]" placeholder="e.g. 5G, LTE" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label style="color: #34495e;">Wi-Fi</label>
                                            <input type="text" class="form-control" name="connectivity[wi_fi]" placeholder="e.g. Wi-Fi 6" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label style="color: #34495e;">Bluetooth</label>
                                            <input type="text" class="form-control" name="connectivity[bluetooth_version]" placeholder="e.g. Bluetooth 5.3" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label style="color: #34495e;">Short-Range</label>
                                            <input type="text" class="form-control" name="connectivity[short_range]" placeholder="e.g. NFC" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label style="color: #34495e;">GNSS</label>
                                            <input type="text" class="form-control" name="connectivity[GNSS]" placeholder="e.g. GPS, GLONASS" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label style="color: #34495e;">USB</label>
                                            <input type="text" class="form-control" name="connectivity[USB]" placeholder="e.g. USB-C 3.2" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Security Section -->
                        <div class="card mb-4" style="border-color: #e0e0e0;">
                            <div class="card-header" style="background-color: #1abc9c; color: white;">
                                <h5 class="card-title m-0"><i class="fas fa-shield-alt mr-2"></i>Security Features</h5>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label style="color: #34495e;">Fingerprint Sensor</label>
                                            <input type="text" class="form-control" name="security_features[fingerprint_sensor_type]" placeholder="e.g. Under-display" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label style="color: #34495e;">Biometric Auth</label>
                                            <input type="text" class="form-control" name="security_features[biometric_authentication]" placeholder="e.g. Face Unlock" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label style="color: #34495e;">Security Platform</label>
                                            <input type="text" class="form-control" name="security_features[security_platform]" placeholder="e.g. Knox Security" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label style="color: #34495e;">File Protection</label>
                                            <input type="text" class="form-control" name="security_features[private_file_protection]" placeholder="e.g. Secure Folder" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label style="color: #34495e;">IP Rating</label>
                                            <input type="text" class="form-control" name="security_features[ingress_protection_rating]" placeholder="e.g. IP68" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label style="color: #34495e;">Updates Policy</label>
                                            <input type="text" class="form-control" name="security_features[security_updates_policy]" placeholder="e.g. 4 years of updates" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group text-center mt-4">
                            <button type="submit" class="btn btn-primary btn-lg px-5" style="background-color: #2980b9; border-color: #2980b9;">
                                <i class="fas fa-save mr-2"></i> Save Specifications
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
        border-radius: 8px;
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
        color: #34495e;
    }
    .input-group-append button {
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
    .card-header {
        border-bottom: none;
        border-radius: 8px 8px 0 0 !important;
    }
</style>
@endpush

@push('scripts')
<script>
    $(document).ready(function() {
        // Add storage field
        $(document).on('click', '.add-storage-btn', function() {
            const newField = `
                <div class="input-group mb-2">
                    <input type="text" class="form-control" name="storage[]" placeholder="e.g. 256GB UFS 3.1" required>
                    <div class="input-group-append">
                        <button class="btn btn-danger remove-field-btn" type="button">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
            `;
            $('#storage-group').append(newField);
        });

        // Remove field
        $(document).on('click', '.remove-field-btn', function() {
            $(this).closest('.input-group').remove();
        });

        // Form validation
        $('#mobileSpecForm').validate({
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