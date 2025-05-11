<div class="modal fade" id="detailsModal-{{ $agent_request->id }}" tabindex="-1" aria-labelledby="detailsModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content rounded-3 shadow-lg border-0">
            <div class="modal-header bg-info text-white py-3">
                <h5 class="modal-title fw-bold" id="detailsModalLabel">
                    <i class="fa fa-info-circle me-2"></i> Request Details
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body p-4 bg-light">
                <div class="row g-3">

                    <div class="col-md-6">
                        <div class="bg-white border rounded-2 p-3 h-100 shadow-sm">
                            <h6 class="text-secondary mb-1"><i class="fa fa-id-badge me-1 text-info"></i> ID</h6>
                            <p class="fw-semibold text-dark mb-0">{{ $agent_request->id }}</p>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="bg-white border rounded-2 p-3 h-100 shadow-sm">
                            <h6 class="text-secondary mb-1"><i class="fa fa-briefcase me-1 text-info"></i> Business Name</h6>
                            <p class="fw-semibold text-dark mb-0">{{ $agent_request->business_name }}</p>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="bg-white border rounded-2 p-3 h-100 shadow-sm">
                            <h6 class="text-secondary mb-1"><i class="fa fa-registered me-1 text-info"></i> Commercial Number</h6>
                            <p class="fw-semibold text-dark mb-0">{{ $agent_request->commercial_number }}</p>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="bg-white border rounded-2 p-3 h-100 shadow-sm">
                            <h6 class="text-secondary mb-1"><i class="fa fa-map-marker-alt me-1 text-info"></i> Location</h6>
                            <p class="fw-semibold text-dark mb-0">
                                Latitude: {{ $agent_request->latitude }} <br>
                                Longitude: {{ $agent_request->longitude }}
                            </p>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="bg-white border rounded-2 p-3 h-100 shadow-sm">
                            <h6 class="text-secondary mb-1"><i class="fa fa-info me-1 text-info"></i> Status</h6>
                            <span class="badge bg-{{ $agent_request->status === 'approved' ? 'success' : ($agent_request->status === 'pending' ? 'warning text-dark' : 'danger') }}">
                                {{ ucfirst($agent_request->status) }}
                            </span>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="bg-white border rounded-2 p-3 h-100 shadow-sm">
                            <h6 class="text-secondary mb-1"><i class="fa fa-calendar-alt me-1 text-info"></i> Created At</h6>
                            <p class="fw-semibold text-dark mb-0">{{ $agent_request->created_at->format('Y-m-d H:i') }}</p>
                        </div>
                    </div>

                    @if($agent_request->notes)
                    <div class="col-12">
                        <div class="bg-white border rounded-2 p-3 shadow-sm">
                            <h6 class="text-secondary mb-1"><i class="fa fa-sticky-note me-1 text-info"></i> Notes</h6>
                            <p class="fw-normal text-dark mb-0">{{ ucfirst($agent_request->notes) }}</p>
                        </div>
                    </div>
                    @endif

                </div>
            </div>

            <div class="modal-footer bg-white border-top-0 justify-content-end px-4 pb-3">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                    <i class="fa fa-times me-1"></i> Close
                </button>
            </div>
        </div>
    </div>
</div>