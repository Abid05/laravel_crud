<form action="{{ route('product.update') }}" method="Post">
    @csrf
    <div class="modal-body">

            <div class="form-group">
                <div class="form-group">
                    <label for="product_name">Product Name</label>
                    <input type="text" class="form-control"  name="name" required value="{{ $data->name }}">
                </div> 
                <input type="hidden" name="id" value="{{ $data->id }}"> 
                <div class="form-group">
                    <label for="product_quantity">Product Quantity</label>
                    <input type="text" class="form-control"  name="quantity" required value="{{ $data->quantity }}">
                </div>   
                <div class="form-group">
                    <label for="product_price">Product Price</label>
                    <input type="text" class="form-control"  name="price" required value="{{ $data->price }}">
                </div>     
            </div>  
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <button type="Submit" class="btn btn-primary">Submit</button>
    </div>
</form>