<form id="updateForm" class="updateForm" method="POST" enctype="multipart/form-data" action="{{route('admins.update',$row->id)}}">
    @csrf
    @method('PUT')
    <div class="modal-body">
        <div class="mb-3 h-25">
            <label class="form-label">Photo</label>
            <input type="file" class="dropify" name="image" data-default-file="{{getUserImage($row->image)}}"
                   accept="image/png, image/gif, image/jpeg,image/jpg, image/webp"/>
            <span class="form-text text-info">Accept Only : png, gif, jpeg, jpg, webp</span>
        </div>
        <input type="hidden" value="{{$row->id}}" name="id">
        <div class="mb-3">
            <label class="form-label">Full Name</label>
            <input type="text" name="name" class="form-control" placeholder="Enter Admin Full Name" value="{{$row->name}}">
        </div>
        <div class="row mb-3">
            <div class="col-6">
                <label class="form-label">Email</label>
                <input type="email" name="email" class="form-control" placeholder="Enter Email ID" value="{{$row->email}}">
            </div>
            <div class="col-6">
                <label class="form-label">Password</label>
                <input type="password" name="password" class="form-control" placeholder="********">
            </div>
        </div>

    </div>
    <div class="modal-footer">
        <button type="submit" class="btn btn-success" id="updateButton">Update</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
    </div>
</form>

<script>
    $('.dropify').dropify();
</script>
