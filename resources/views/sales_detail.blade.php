@extends('template.main')
@section('content')
    <div class="row">
        <div class="col-md-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Sale Detail</h4>
                    <form action="{{ route('add_product') }}" method="POST">
                        @csrf
                        @foreach ($sales as $sale)
                            <input type="hidden" name="id_sale" value="{{ $sale->id }}">
                        @endforeach
                        <div class="mb-3">
                            <label for="id_product" class="col-form-label">Product</label>
                            <select class="form-control" id="id_product" name="id_product">
                                <option value="">Select Product</option>
                                @foreach ($products as $product)
                                    <option value="{{ $product->id }}">{{ $product->product_name }}({{ $product->stock }})
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="total_product" class="col-form-label">Quantity</label>
                            <input type="number" class="form-control" id="total_product" name="total_product">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success"> Add Product </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
        <div class="col-lg-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">All Your Order</h4>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Number</th>
                                <th>Product</th>
                                <th>Total_product</th>
                                <th>Price</th>
                                <th>Cancel</th>
                            </tr>
                        </thead>
                        @php
                            $number = 1;
                        @endphp
                        <tbody>
                            @foreach ($sales_details as $sales_detail)
                            @if ($sales_detail->id_sale == $sale->id)

                            <tr>
                                <td>{{$number++}}</td>
                                <td>{{ $sales_detail->product->product_name }}</td>
                                <td>{{ $sales_detail->total_product }}</td>
                                <td>{{ $sales_detail->sub_total }}</td>
                                <form action="{{route('cancel',$sales_detail->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <td><button type="submit" class="btn btn-danger">Delete</button></td>
                                </form>
                            </tr>
                            @endif
                            @endforeach
                        </tbody>
                    </table>
                    <form action="{{route('finish')}}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="total_product" class="col-form-label">Total Price</label>
                            <input type="number" class="form-control" id="total_product" name="total_product" readonly value="{{$sale->total_price}}">
                        </div>
                        <div>
                            <button class="btn btn-success">Finish</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
