<div class="modal fade" id="detailsModalDeleteAcount" tabindex="-1" aria-labelledby="actionModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="actionModalLabel"> Delete your account</h5>

                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                <p class="mb-3">Are you sure you want to delete your account? Enter the password to confirm</p>
                <div class="d-flex justify-content-center gap-3">
                    {{-- Approve --}}
                    <form action="{{ route('profile.destroy') }}" method="post" style="display: inline;">
                            @csrf
                            @method('delete')
                             <!-- current_password -->
                            <div class="relative">
                                <input type="password" id="current-password" name="password" placeholder="Enter your password"
                                        class="input-field w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent">
                                <button type="button" class="absolute right-3 top-2 text-gray-500 hover:text-gray-700" onclick="togglePassword('current-password')">
                                    <i class="far fa-eye"></i>
                                </button>
                            </div>
                            <div style="padding-top: 10px;">
                                <button type="submit" class="fancy-btn btn-delete"> Delete</button>

                            </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
