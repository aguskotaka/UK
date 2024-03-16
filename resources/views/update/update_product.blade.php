{{-- edit user--}}
<div class="modal fade" id="edit_product{{$product->id}}" tabindex="-1" aria-labelledby="edit_product" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="edit_product">New message</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{route('product.update',$product->id)}}" method="POST" >
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="product_name" class="col-form-label">Product Price</label>
                        <input type="text" class="form-control" id="product_name" name="product_name" value="{{$product->product_name}}">
                    </div>
                    <div class="mb-3">
                        <label for="product_price" class="col-form-label">Product Price</label>
                        <input type="number" class="form-control" id="product_price" name="product_price" value="{{$product->product_price}}">
                    </div>
                    <div class="mb-3">
                        <label for="stock" class="col-form-label">Stock</label>
                        <input type="number" class="form-control" id="stock" name="stock" value="{{$product->stock}}">
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
