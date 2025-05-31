<div class="modal fade" id="actionModalNotificationDestroy-{{ $notification->id }}" tabindex="-1" aria-labelledby="actionModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="actionModalLabe">Notification Action</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                <p class="mb-3">Are you sure you want to delete?</p>
                <div class="d-flex justify-content-center gap-3">
                    {{-- Approve --}}
                    <form action="{{ route('agent.notifications.destroy', $notification->id) }}" method="POST" >
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="fancy-btn btn-delete" >Delete</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
