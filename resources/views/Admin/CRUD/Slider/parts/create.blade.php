<form id="addForm" class="addForm" method="POST" enctype="multipart/form-data" action="{{route('admins.store')}}">
    @csrf
    <div class="modal-body">
        <div class="mb-3 h-25">
            <label class="form-label">Photo</label>
            <input type="file" class="dropify" name="image" data-default-file="{{getUserImage()}}"
                   accept="image/png, image/gif, image/jpeg,image/jpg, image/webp"/>
            <span class="form-text text-info">Accept Only : png, gif, jpeg, jpg, webp</span>
        </div>
        <div class="mb-3">
            <label class="form-label">Full Name</label>
            <input type="text" name="name" class="form-control" placeholder="Enter Admin Full Name">
        </div>
        <div class="row mb-3">
            <div class="col-6">
                <label class="form-label">Email</label>
                <input type="email" name="email" class="form-control" placeholder="Enter Email ID">
            </div>
            <div class="col-6">
                <label class="form-label">Password</label>
                <input type="password" name="password" class="form-control" placeholder="********">
            </div>
        </div>

    </div>
    <div class="modal-footer">
        <button type="submit" class="btn btn-primary" id="addButton">Submit</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
    </div>
</form>

<script>
    $('.dropify').dropify("Upload Here");
</script>
