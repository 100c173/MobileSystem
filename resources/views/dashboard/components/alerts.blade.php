{{-- Success Alert --}}
@if (session('success'))
<div class="alert-container animate__animated animate__fadeInDown">
    <div class="alert alert-success alert-dismissible shadow-lg p-4 rounded-4 border-success-subtle position-relative" role="alert">
        <div class="d-flex align-items-center mb-2">
            <div class="me-2 fs-3 text-success"><i class="bx bx-check-circle"></i></div>
            <h5 class="m-0 fw-bold">Success!</h5>
        </div>
        <p class="mb-0 fs-6">{{ session('success') }}</p>
        <button type="button" class="btn-close position-absolute top-0 end-0 m-3" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
</div>
@endif

{{-- Error Alert --}}
@if (session('error'))
<div class="alert-container animate__animated animate__fadeInDown">
    <div class="alert alert-danger alert-dismissible shadow-lg p-4 rounded-4 border-danger-subtle position-relative" role="alert">
        <div class="d-flex align-items-center mb-2">
            <div class="me-2 fs-3 text-danger"><i class="bx bx-error-circle"></i></div>
            <h5 class="m-0 fw-bold">Error!</h5>
        </div>
        <p class="mb-0 fs-6">{{ session('error') }}</p>
        <button type="button" class="btn-close position-absolute top-0 end-0 m-3" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
</div>
@endif

{{-- Validation Errors --}}
@if ($errors->any())
<div class="alert-container animate__animated animate__fadeInDown">
    <div class="alert alert-warning alert-dismissible shadow-lg p-4 rounded-4 border-warning-subtle position-relative" role="alert">
        <div class="d-flex align-items-center mb-2">
            <div class="me-2 fs-3 text-warning"><i class="bx bx-info-circle"></i></div>
            <h5 class="m-0 fw-bold">Please check the following:</h5>
        </div>
        <ul class="mb-0 ps-4">
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
        <button type="button" class="btn-close position-absolute top-0 end-0 m-3" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
</div>
@endif
<style>
.alert-container {
    position: fixed;
    top: 20px;
    left: 50%;
    transform: translateX(-50%);
    z-index: 1050; /* تأكد أنه أعلى من العناصر الأخرى */
    max-width: 800px;
    width: 90%;
    pointer-events: none; /* حتى لا تعيق النقرات */
}

.alert-container .alert {
    pointer-events: auto; /* فقط التنبيهات نفسها تستقبل النقرات (مثلاً زر الإغلاق) */
}

</style>