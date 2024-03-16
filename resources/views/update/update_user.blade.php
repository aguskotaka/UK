{{-- edit user--}}
<div class="modal fade" id="edit_user{{$user->id}}" tabindex="-1" aria-labelledby="edit_user" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="edit_user">New message</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{route('user.update',$user->id)}}" method="POST" >
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="name" class="col-form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{$user->name}}">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="col-form-label">Email</label>
                        <input type="text" class="form-control" id="email" name="email" value="{{$user->email}}">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success"> Update </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
{{-- edit user--}}
