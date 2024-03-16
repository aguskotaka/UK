{{-- edit user--}}
<div class="modal fade" id="sales_detail{{$sale->id}}" tabindex="-1" aria-labelledby="sales_detail" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="sales_detail">New message</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Number</th>
                            <th>Product</th>
                            <th>Total_product</th>
                            <th>Price</th>
                        </tr>
                    </thead>
                    @php
                        $number = 1;
                    @endphp
                    <tbody>
                        @foreach ($sales_details as $sales_detail)
                        @if ($sales_detail->id_sale == $sale->id )

                        <tr>
                            <td>{{$number++}}</td>
                            <td>{{ $sales_detail->product->product_name }}</td>
                            <td>{{ $sales_detail->total_product }}</td>
                            <td>{{ $sales_detail->sub_total }}</td>
                        </tr>

                        @endif
                        @endforeach
                    </tbody>
                </table>
                <form action="">
                    <div class="mb-3">
                        <label for="total_product" class="col-form-label">Total Price</label>
                        <input type="number" class="form-control" id="total_product" name="total_product" readonly value="{{$sale->total_price}}">
                    </div>
                    <div>
                        <a href="{{route('sales.index')}}" class="btn btn-success">FINISH</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
{{-- edit user--}}
