<div class="modal fade" id="detailsModalEditOs-{{$os->id }}-{{$os->name}}" tabindex="-1" aria-labelledby="detailsModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content rounded-3 shadow-lg border-0">
            <div class="modal-header bg-success text-white py-3">
                <h5 class="modal-title fw-bold" id="detailsModalLabel">
                    <i class="fas fa-plus"></i> Edit operating system
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body p-4 bg-light">
            <div class="card-body text-primary">
                <form action="{{route('operatingSystems.update',$os->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <div>
                            <label for="exampleInputEmail"> Operating system name </label>
                        </div>
                        <div class="col-sm-12 col-md-12">
                            <div class="custom-file">
                                <input class="form-control" id="name" name="name" value='{{$os->name}}' type="text">
                            </div>
                        </div>
                    </div>

                    <div class="card-footer" style="padding-left: 500px;">
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
