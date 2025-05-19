<div class="modal fade" id="detailsModalAddImage-{{ $mobile->id }}" tabindex="-1" aria-labelledby="detailsModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content rounded-3 shadow-lg border-0">
            <div class="modal-header bg-success text-white py-3">
                <h5 class="modal-title fw-bold" id="detailsModalLabel">
                    <i class="fas fa-plus"></i> Add Image
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body p-4 bg-light">
            <div class="card-body text-primary">
                <form action="{{route('mobileImages.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group" style="display: none;">
                        <label for="exampleInputEmail" >Mobile Id </label>
                        <input type="text" class="form-control" id="mobile_id" name="mobile_id" value="{{$mobile->id}}" name="book_name" >
                    </div>

                    <div class="form-group">
                        <div>
                            <label for="exampleInputEmail">Mobile Image</label>
                        </div>
                        <div class="col-sm-12 col-md-12">
                            <div class="custom-file">
                                <input class="form-control" id="image_url" name="image_url" type="file">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail" >caption</label>
                        <input type="text" class="form-control" id="caption" name="caption" required>
                    </div>

                    <div class="form-check form-switch text-start mt-2">
                        <input class="form-check-input" type="checkbox" id="mainImageSwitch" name="is_primary" value="1" >
                        <label class="form-check-label" for="mainImageSwitch">  Do you want to make this image is the main image? </label>
                    </div>


                    </div>


                    <div class="card-footer" style="padding-left: 550px;">
                        <button class="fancy-btn btn-success" type="submit"><i class="fas fa-save"></i> Save</button>
                        <button type="button" class="fancy-btn btn-delete" data-bs-dismiss="modal">
                            <i class="fa fa-times me-1"></i> Close
                        </button>
                    </div>
                </form>
            </div>
            </div>
        </div>
    </div>
</div>