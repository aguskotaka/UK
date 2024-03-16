{{-- edit user--}}
<div class="modal fade" id="edit_client{{$client->id}}" tabindex="-1" aria-labelledby="edit_client" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="edit_client">New message</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{route('client.update',$client->id)}}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="client_name" class="col-form-label">client Price</label>
                        <input type="text" class="form-control" id="client_name" name="client_name" value="{{$client->client_name}}">
                    </div>
                    <div class="mb-3">
                        <label for="address" class="col-form-label">Address</label>
                        <input type="text" class="form-control" id="address" name="address" value="{{$client->address}}">
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="col-form-label">Phone</label>
                        <input type="number" class="form-control" id="phone" name="phone" value="{{$client->phone}}">
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
