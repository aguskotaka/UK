@extends('template.main')
@section('content')

@php
$user = auth()->user();
@endphp


    <div class="col-lg-12 grid-margin stretch-card">

        <div class="card">
            <div class="card-body">
                @if ($user && $user->level == 'admin')

                <button type="button" class="btn btn-primary mb-4" data-bs-toggle="modal" data-bs-target="#create_product"
                data-bs-whatever="@getbootstrap">Add New Product ?
            </button>
            @endif

                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th> No</th>
                            <th> Product Name</th>
                            <th> Product Price </th>
                            <th> Stock </th>
                            <th> Edit </th>
                            <th> Delete </th>
                        </tr>
                    </thead>
                    @php
                        $row = 1;
                    @endphp
                    <tbody>
                        @foreach ($products as $product)

                        <tr>

                            <td class="py-1" >{{$row++}}</td>
                            <td class="py-1" >{{$product->product_name}}</td>
                            <td class="py-1" >{{$product->product_price}}</td>
                            <td class="py-1" >{{$product->stock}}</td>
                            @if ($user && $user->level == 'admin')
                            <td>
                                    <button type="submit" class="btn btn-success mb-4" data-bs-toggle="modal" data-bs-target="#edit_product{{$product->id}}"
                                    data-bs-whatever="@getbootstrap">Edit</button>

                                    @include('update.update_product')

                            </td>
                            <td>
                                <form action="{{route('product.destroy',$product->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger mb-4">Delete</button>

                                </form>
                            </td>

                            @endif
                        </tr>

                        @endforeach
                    </tbody>

                    </table>
                    {{$products->links('pagination::bootstrap-5')}}
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
                <form action="{{route('product.store')}}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="product_name" class="col-form-label">Product Name</label>
                        <input type="text" class="form-control" id="product_name" name="product_name">
                    </div>
                    <div class="mb-3">
                        <label for="product_price" class="col-form-label">Product Price</label>
                        <input type="number" class="form-control" id="product_price" name="product_price">
                    </div>
                    <div class="mb-3">
                        <label for="stock" class="col-form-label">Stock</label>
                        <input type="number" class="form-control" id="stock" name="stock">
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
