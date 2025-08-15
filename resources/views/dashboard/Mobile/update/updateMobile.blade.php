@extends('dashboard.layouts.app')

@section('title', __('Edit Mobile Device'))

@include('dashboard.components.alerts')

@section('content')
<div class="page-inner">
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <i class="fas fa-mobile-alt fa-lg text-primary me-3"></i>
                        <h4 class="card-title mb-0">{{ __('Edit Mobile Device') }}: {{ $mobile->name }}</h4>
                    </div>
                </div>

                <div class="card-body">
                    <form action="{{ route('admin.mobiles.update', $mobile->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('put')

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name" class="form-label required">{{ __('Device Name') }}</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                                        id="name" name="name" placeholder="{{ __('Enter device name') }}"
                                        value="{{ old('name', $mobile->name) }}" required>
                                    @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="release_date" class="form-label required">{{ __('Release Date') }}</label>
                                    <input type="date" class="form-control @error('release_date') is-invalid @enderror"
                                        id="release_date" name="release_date" 
                                        value="{{ old('release_date', $mobile->release_date) }}" required>
                                    @error('release_date')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="brand_id" class="form-label required">{{ __('Brand') }}</label>
                                    <select name="brand_id" id="brand_id" class="form-select @error('brand_id') is-invalid @enderror" required>
                                        <option value="" disabled>{{ __('Select a brand') }}</option>
                                        @foreach($brands as $brand)
                                        <option value="{{ $brand->id }}" 
                                            {{ old('brand_id', $mobile->brand_id) == $brand->id ? 'selected' : '' }}>
                                            {{ $brand->name }}
                                        </option>
                                        @endforeach
                                    </select>
                                    @error('brand_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="operating_system_id" class="form-label required">{{ __('Operating System') }}</label>
                                    <select name="operating_system_id" id="operating_system_id"
                                        class="form-select @error('operating_system_id') is-invalid @enderror" required>
                                        <option value="" disabled>{{ __('Select an OS') }}</option>
                                        @foreach($operatingsystems as $os)
                                        <option value="{{ $os->id }}" 
                                            {{ old('operating_system_id', $mobile->operating_system_id) == $os->id ? 'selected' : '' }}>
                                            {{ $os->name }}
                                        </option>
                                        @endforeach
                                    </select>
                                    @error('operating_system_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- يمكن إضافة المزيد من الحقول هنا -->

                        <div class="form-group mt-4 d-flex justify-content-end">
                            <a href="{{ route('admin.mobiles.index') }}" class="btn btn-light me-3">
                                <i class="fas fa-times me-2"></i>{{ __('Cancel') }}
                            </a>
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save me-2"></i>{{ __('Save Changes') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title"><i class="fas fa-info-circle me-2"></i>{{ __('Device Information') }}</h5>
                </div>
                <div class="card-body">
                    <ul class="list-unstyled">
                        <li class="mb-2">
                            <strong>{{ __('Created At') }}:</strong> 
                            {{ $mobile->created_at->format('Y-m-d H:i') }}
                        </li>
                        <li class="mb-2">
                            <strong>{{ __('Last Updated') }}:</strong> 
                            {{ $mobile->updated_at->format('Y-m-d H:i') }}
                        </li>
                        <li class="mb-2">
                            <strong>{{ __('Current Brand') }}:</strong> 
                            {{ $mobile->brand->name }}
                        </li>
                        <li class="mb-2">
                            <strong>{{ __('Current OS') }}:</strong> 
                            {{ $mobile->operatingSystem->name }}
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
    .required:after {
        content: " *";
        color: #f44336;
    }

    .form-control,
    .form-select {
        border-radius: 0.375rem;
        border: 1px solid #ced4da;
        transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
    }

    .form-control:focus,
    .form-select:focus {
        border-color: #86b7fe;
        box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.25);
    }

    .card {
        border-radius: 0.5rem;
        box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
    }
</style>
@endpush

@push('scripts')
<script>
    $(document).ready(function() {
        
        $('#brand_id, #operating_system_id').select2({
            theme: 'bootstrap-5',
            placeholder: $(this).data('placeholder'),
            allowClear: true
        });
    });
</script>
@endpush