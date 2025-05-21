<div class="modal fade" id="addProductModal{{ $mobile->id }}" tabindex="-1" aria-labelledby="addProductModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content border-0 shadow-lg rounded-4">

      <div class="modal-header bg-success text-white rounded-top-4">
        <h5 class="modal-title" id="addProductModalLabel">
          <i class="fa fa-box me-2"></i> Add a New Power Product!
        </h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <form action="{{ route('agent-stocks.store') }}" method="POST">
        @csrf
        <div class="modal-body px-4 py-3">

          <p class="text-muted">Let's gear up your inventory. Fill in the details below:</p>

          <input type="hidden" name="mobile_id" value="{{ $mobile->id }}" >

          <div class="mb-3">
            <label for="productPrice" class="form-label fw-semibold">Set Your Price ($)</label>
            <input type="number" class="form-control form-control-lg" id="productPrice" name="price" step="0.01" min="0" placeholder="e.g. 99.99" required>
          </div>

          <div class="mb-3">
            <label for="productQuantity" class="form-label fw-semibold">Available Quantity</label>
            <input type="number" class="form-control form-control-lg" id="productQuantity" name="quantity" min="1" placeholder="e.g. 10" required>
          </div>

        </div>
        <div class="modal-footer bg-light rounded-bottom-4">
          <button type="button" class="btn btn-outline-secondary rounded-pill" data-bs-dismiss="modal">
            <i class="fa fa-times me-1"></i> Cancel
          </button>
          <button type="submit" class="btn btn-success rounded-pill px-4 fw-bold shadow">
            <i class="fa fa-rocket me-1"></i> Add Product Now
          </button>
        </div>
      </form>

    </div>
  </div>
</div>
