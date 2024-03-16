{{-- edit user--}}
<div class="modal fade" id="edit_sale{{$sale->id}}" tabindex="-1" aria-labelledby="edit_sale" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="edit_sale">New message</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{route('sales.update',$sale->id)}}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="sales_date" class="col-form-label">Sale Date</label>
                        <input type="text" class="form-control" id="sales_date" name="sales_date" value="{{$sale->sales_date}}">
                    </div>
                    <div class="mb-3">
                        <label for="id_client" class="col-form-label">Client Name</label>
                        <select class="form-control" name="id_client" id="id_client">
                            @foreach ($clients as $client)
                                <option value="{{$client->id}}" @if ($sale->id_client == $client->id) selected @endif>
                                    {{$client->client_name}}
                                </option>
                            @endforeach
                        </select>
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
