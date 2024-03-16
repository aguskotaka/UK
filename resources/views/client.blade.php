@extends('template.main')
@section('content')




    <div class="col-lg-12 grid-margin stretch-card">

        <div class="card">
            <div class="card-body">
                <button type="button" class="btn btn-primary mb-4" data-bs-toggle="modal" data-bs-target="#create_product"
                data-bs-whatever="@getbootstrap">Add New Client ?
                </button>

                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th> No </th>
                            <th> Client Name</th>
                            <th> Address </th>
                            <th> Phone Number </th>
                            <th> Edit </th>
                            <th> Delete </th>
                        </tr>
                    </thead>
                    @php
                        $row = 1;
                    @endphp
                    <tbody>
                        @foreach ($clients as $client)
                        <tr>

                            <td class="py-1" >{{$row++}}</td>
                            <td class="py-1" >{{$client->client_name}}</td>
                            <td class="py-1" >{{$client->address}}</td>
                            <td class="py-1" >{{$client->phone}}</td>

                            <td>
                                    <button type="submit" class="btn btn-success mb-4" data-bs-toggle="modal" data-bs-target="#edit_client{{$client->id}}"
                                    data-bs-whatever="@getbootstrap">Edit</button>

                                        @include('update.update_client')
                            </td>
                            <td>
                                <form action="{{route('client.destroy',$client->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger mb-4">Delete</button>

                                </form>
                            </td>
                        </tr>

                        @endforeach
                    </tbody>
                    </table>
            </div>
        </div>
    </div>

{{-- create user--}}
<div class="modal fade" id="create_product" tabindex="-1" aria-labelledby="create_product" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="create_product"> Yay Something New ?</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{route('client.store')}}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="client_name" class="col-form-label">Client Name</label>
                        <input type="text" class="form-control" id="client_name" name="client_name">
                    </div>
                    <div class="mb-3">
                        <label for="address" class="col-form-label">address</label>
                        <input type="text" class="form-control" id="address" name="address">
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="col-form-label">Phone</label>
                        <input type="number" class="form-control" id="phone" name="phone">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success"> Input </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
{{-- create user--}}



@endsection
