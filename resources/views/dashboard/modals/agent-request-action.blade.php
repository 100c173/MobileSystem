<div class="modal fade" id="actionModal-{{ $agent_request->id }}" tabindex="-1" aria-labelledby="actionModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="actionModalLabel">Request Action</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                <p class="mb-3">What would you like to do with this request?</p>
                <div class="d-flex justify-content-center gap-3">
                    {{-- Approve --}}
                    <form method="POST" action="{{route('agent-requests-accepte',$agent_request->id)}}">
                        @csrf
                        <button type="submit" class="btn btn-success">
                            <i class="fa fa-check me-1"></i> Approve
                        </button>
                    </form>
                    {{-- Reject --}}
                    <form method="POST" action="{{route('agent-requests-reject',$agent_request->id)}}">
                        @csrf
                        <button type="submit" class="btn btn-danger">
                            <i class="fa fa-times me-1"></i> Reject
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>