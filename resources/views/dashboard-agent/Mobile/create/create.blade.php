@extends('dashboard-agent.layouts.app')

@section('title')
Mobile
@endsection

@include('dashboard-agent.components.alerts')
@section('content')
<div class="page-inner">

    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title m-0 d-flex align-items-center">
                    <i class="fas fa-mobile-alt me-2"></i>
                    Add new Mobiles
                </h4>
            </div>

            <div class="card-body text-primary">
                <form action="{{route('agent.mobiles.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label for="exampleInputEmail">Mobile name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter mobile name" required>
                    </div>


                    <div class="form-group">
                        <label for="exampleInputEmail">Mobile brand</label>
                        <select name="brand_id" id="" class="form-control">
                            <option value="" disabled selected>Select A Brand</option>
                            @foreach($brands as $brand)
                            <option value="{{$brand->id}}">{{$brand->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail">Operating system </label>
                        <select name="operating_system_id" id="" class="form-control">
                            <option value="" disabled selected>Select A Brand</option>
                            @foreach($operatingsystems as $operatingsystem)
                            <option value="{{$operatingsystem->id}}">{{$operatingsystem->name}}</option>
                            @endforeach
                        </select>
                    </div>@extends('dashboard.layouts.app')

                    @section('title', __('Mobile Devices'))

                    @include('dashboard.components.alerts')

                    @section('content')
                    <div class="page-inner">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="d-flex align-items-center">
                                            <i class="fas fa-mobile-alt fa-lg text-primary me-3"></i>
                                            <h4 class="card-title mb-0">{{ __('Add New Mobile Device') }}</h4>
                                        </div>
                                    </div>

                                    <div class="card-body">
                                        <form action="{{ route('agent.mobiles.store') }}" method="POST" enctype="multipart/form-data">
                                            @csrf

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="name" class="form-label required">{{ __('Device Name') }}</label>
                                                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                                                            id="name" name="name" placeholder="{{ __('Enter device name') }}"
                                                            value="{{ old('name') }}" required>
                                                        @error('name')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="release_date" class="form-label required">{{ __('Release Date') }}</label>
                                                        <input type="date" class="form-control @error('release_date') is-invalid @enderror"
                                                            id="release_date" name="release_date" required>
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
                                                            <option value="" disabled selected>{{ __('Select a brand') }}</option>
                                                            @foreach($brands as $brand)
                                                            <option value="{{ $brand->id }}" {{ old('brand_id') == $brand->id ? 'selected' : '' }}>
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
                                                            <option value="" disabled selected>{{ __('Select an OS') }}</option>
                                                            @foreach($operatingsystems as $os)
                                                            <option value="{{ $os->id }}" {{ old('operating_system_id') == $os->id ? 'selected' : '' }}>
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
                                                <button type="button" class="btn btn-light me-3" onclick="window.history.back()">
                                                    <i class="fas fa-times me-2"></i>{{ __('Cancel') }}
                                                </button>
                                                <button type="submit" class="btn btn-primary">
                                                    <i class="fas fa-save me-2"></i>{{ __('Save Device') }}
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="card-title"><i class="fas fa-info-circle me-2"></i>{{ __('Instructions') }}</h5>
                                    </div>
                                    <div class="card-body">
                                        <ul class="list-unstyled">
                                            <li class="mb-2">
                                                <i class="fas fa-check-circle text-success me-2"></i>
                                                {{ __('Fill all required fields marked with asterisk (*)') }}
                                            </li>
                                            <li class="mb-2">
                                                <i class="fas fa-check-circle text-success me-2"></i>
                                                {{ __('Ensure release date is accurate') }}
                                            </li>
                                            <li class="mb-2">
                                                <i class="fas fa-check-circle text-success me-2"></i>
                                                {{ __('Select the correct brand and OS') }}
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
                            // يمكن إضافة أي سكريبتات مطلوبة هنا
                            $('#brand_id, #operating_system_id').select2({
                                theme: 'bootstrap-5',
                                placeholder: $(this).data('placeholder'),
                                allowClear: true
                            });
                        });
                    </script>
                    @endpush


                    <div class="form-group">
                        <label for="exampleInputEmail">Release date </label>
                        <input type="date" class="form-control" id="release_date" name="release_date" placeholder="Enter mobile Release date" required>
                    </div>

            </div>

            <div class="card-footer" style="padding-left: 1200px;">
                <button class="fancy-btn btn-success" type="submit"><i class="fas fa-save"></i> Save</button>
                <button type="button" class="fancy-btn btn-delete" data-bs-dismiss="modal">
                    <i class="fa fa-times me-1"></i> Close
                </button>
            </div>
            </form>

        </div> <!-- /.card-body -->
    </div> <!-- /.card -->
</div> <!-- /.col-md-12 -->
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