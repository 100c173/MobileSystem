<!-- Reject Modal -->
<div class="modal fade" id="rejectModal-{{ $agent_request->id }}" tabindex="-1" aria-labelledby="rejectModalLabel-{{ $agent_request->id }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="rejectModalLabel-{{ $agent_request->id }}">Reject Request</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Reject Reason Form -->
                <form method="POST" action="{{ route('agent-requests-reject', $agent_request->id) }}">
                    @csrf
                    <div class="mb-3">
                        <label for="reject_reason" class="form-label">Reason for Rejection</label>
                        <textarea class="form-control" id="reject_reason" name="reject_reason" rows="4" required></textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-danger">Submit Reject</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
