@extends('template.main')
@section('content')




    <div class="col-lg-12 grid-margin stretch-card">

        <div class="card">
            <div class="card-body">
                <button type="button" class="btn btn-primary mb-4" data-bs-toggle="modal" data-bs-target="#create_sales"
                data-bs-whatever="@getbootstrap">Add New Sale ?
                </button>

                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th> No </th>
                            <th> Sale Date</th>
                            <th> Total Price </th>
                            <th> Client Id </th>
                            <th> Edit </th>
                            <th> Delete </th>
                            <th> Detail </th>
                        </tr>
                    </thead>
                    @php
                        $row = 1;
                    @endphp
                    <tbody>
                        @foreach ($sales as $sale)

                        <tr>

                            <td class="py-1" >{{$row++}}</td>
                            <td class="py-1" >{{$sale->sales_date}}</td>
                            <td class="py-1" >{{$sale->total_price}}</td>
                            <td class="py-1" >{{$sale->client->client_name}}</td>
                            <td>
                                <button type="submit" class="btn btn-warning mb-4" data-bs-toggle="modal" data-bs-target="#edit_sale{{$sale->id}}"
                                data-bs-whatever="@getbootstrap">Edit</button>

                                    @include('update.update_sale')
                            </td>
                            <td>
                                <form action="{{route('sales.destroy',$sale->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger mb-4">Delete</button>

                                </form>
                            </td>
                            <td>
                                <button type="submit" class="btn btn-success mb-4" data-bs-toggle="modal" data-bs-target="#sales_detail{{$sale->id}}"
                                data-bs-whatever="@getbootstrap">Sales Detail</button>

                                    @include('update.sales_detail_view')
                            </td>
                        </tr>

                        @endforeach

                    </tbody>
                    </table>
                    {{$sales->links('pagination::bootstrap-5')}}
            </div>
        </div>
    </div>

{{-- create sales--}}
<div class="modal fade" id="create_sales" tabindex="-1" aria-labelledby="create_sales" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="create_sales"> Yay Something New ?</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{route('sales.store')}}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="sales_date" class="col-form-label">Sale Date</label>
                        <input type="text" class="form-control" id="sales_date" name="sales_date">
                    </div>
                    <div class="mb-3">
                        <label for="id_client" class="col-form-label">Client</label>
                        <select class="form-control" id="id_client" name="id_client">
                            <option value="">Select Client</option>
                            @foreach($clients as $client)
                                <option value="{{ $client->id }}">{{$client->client_name}}</option>
                            @endforeach
                        </select>
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
