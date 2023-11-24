@extends('layouts.admin')
@section('admin.content')
      <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Product Table</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <button class="btn btn-primary" data-toggle="modal" data-target="#categoryModal">+Add New</button>
                </ol>
            </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

           <!-- Main content -->
    <section class="content">
        <div class="containe-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                          <h3 class="card-title">Product List</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                          <table id="example1" class="table table-bordered table-striped table-sm">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Product Name</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ( $data as $key => $row)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $row->name }}</td>
                                    <td>{{ $row->quantity }}</td>
                                    <td>{{ $row->price }}</td>
                                    <td>
                                        <a  data-id='{{ $row->id }}' class=" edit btn btn-info btn-sm" data-toggle="modal" data-target="#editModal"><i class="fas fa-edit"></i></a>

                                        <a href="{{ route('product.delete',$row->id) }}" class="btn btn-danger btn-sm" id="delete"><i class="fas fa-trash"></i></a>
                                    </td>
                                </tr>
                                @endforeach

                            </tbody>
                          </table>
                        </div>
                        <!-- /.card-body -->
                      </div>
                </div>
            </div>
        </div><!--/. container-fluid -->
    </section>
</div>

{{-- Product insert modal --}}

<div class="modal fade" id="categoryModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add New Product</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{ route('product.store') }}" method="Post">
            @csrf
            <div class="modal-body">

                    <div class="form-group">
                        <div class="form-group">
                            <label for="product_name">Product Name</label>
                            <input type="text" class="form-control"  name="name" required>
                        </div> 
                        <div class="form-group">
                            <label for="product_quantity">Product Quantity</label>
                            <input type="text" class="form-control"  name="quantity" required>
                        </div>   
                        <div class="form-group">
                            <label for="product_price">Product Price</label>
                            <input type="text" class="form-control"  name="price" required>
                        </div>     
                    </div>  
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                <button type="Submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
      </div>
    </div>
  </div>

{{-- edit insert modal --}}

<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit Product</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
            <div id="modal_body">

            </div>
      </div>
    </div>
  </div>


<!-- ajax -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>


  <script>

      $('.edit').on('click',function(){

        let product_id = $(this).data('id');
        $.get('product/edit/'+product_id,function(data){

           $('#modal_body').html(data);
        
        });
       
      })

  </script>

@endsection  
    
     