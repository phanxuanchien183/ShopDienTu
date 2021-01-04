@extends('adminmaster')
@section('admincontent')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Products</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Products</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            {{-- <h3 class="card-title">Fixed Header Table</h3> --}}
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">
             Add
            </button>
            <div class="card-tools">
              <div class="input-group input-group-sm" style="width: 150px;">
                <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                <div class="input-group-append">
                  <button type="submit" class="btn btn-default">
                    <i class="fas fa-search"></i>
                  </button>
                </div>
              </div>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body table-responsive p-0" style="height: 300px;">
            <table class="table table-head-fixed text-nowrap">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Product Name</th>
                  <th style="max-width:400px;overflow:hidden">Description</th>
                  <th>Unit Price</th>
                  <th>Image link</th>
                  <th>New</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                @foreach ($product as $p)
                  <tr>
                    <td>{{$p->id}}</td>
                    <td>{{$p->name}}</td>
                    <td style="max-width:400px;overflow:hidden">{{$p->description}}</td>
                    <td>{{$p->unit_price}}</td>
                    <td>{{$p->image}}</td>
                    <td>{{$p->new}}</td>
                    <td>
                      <button href="#" type="button" data-product="{{$p}}" onclick="myFunction()" id="editModal" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                      {{-- <button href="#" title="quick view" data-name="{{$p}}" class="quick-view-btn" data-toggle="modal" data-target="#exampleModal"> --}}
                        Edit
                      </button>                      
                      /
                      <a type="button" href="{{route('delproduct',$p->id)}}" class="btn btn-danger" >
                        Delete
                      </a> 
                    </td>
                  </tr>
                @endforeach
                {{-- js insert data in modal product new --}}
                <script>
                // document.getElementById("editModal").addEventListener("click", myFunction);
                //   function myFunction() {
                //     // var id = $(this).data('name');
                //     console.log($(this).data('product'));
                //     $("#idEditProductName").val($(this).data('product').id);
                //     $("#productname").val($(this).data('product').name);
                //     // $("#idtype option:selected").text($(this).data('name').id_type);
                //   }
                  
                  $("button#editModal").on('click',function(evt){
                      console.log($(this).data('product')); 
                      $("#idEditProductName").val($(this).data('product').id);
                      $("#productname").val($(this).data('product').name);
                      $("#idtype").val($(this).data('product').id_type);
                      $("#description").val($(this).data('product').description);
                      $("#unitprice").val($(this).data('product').unit_price);
                      $("#promotionprice").val($(this).data('product').promotion_price);
                      $("#image").val($(this).data('product').image);
                      $("#unit").val($(this).data('product').unit);
                      $("#new").val($(this).data('product').new);
                  });
                </script>
                
              </tbody>
            </table>            
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
    </div>
    <!-- /.content -->
  </div>
  <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Product</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="card-body">
          <div class="form-group">
            <label for="exampleInputEmail1">Id</label>
            <input type="id" id="idEditProductName" class="form-control"  placeholder="Id">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Product Name</label>
            <input type="productname" id="productname" class="form-control"  placeholder="Product Name">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Id Type</label>
            <input type="idtype" id="idtype" class="form-control"  placeholder="Id Type">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Description</label>
            <input type="description" id="description" class="form-control"  placeholder="Description">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Unit Price</label>
            <input type="unitprice" id="unitprice" class="form-control"  placeholder="Unit Price">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Promotion Price</label>
            <input type="promotionprice" id="promotionprice" class="form-control"  placeholder="Promotion Price">
          </div>
          {{-- <div class="form-group">
            <label for="exampleInputEmail1">Image</label>
            <input type="image" id="image" class="form-control"  placeholder="Image">
          </div> --}}
          <div class="form-group">
            <label for="exampleInputFile">File image</label>
            <div class="input-group">
              <div class="custom-file">
                <input type="file" class="custom-file-input" id="image" name="image"
                accept="image/png, image/jpeg">
                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
              </div>
              <div class="input-group-append">
                <span class="input-group-text">Upload</span>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Unit</label>
            <input type="unit" id="unit" class="form-control"  placeholder="Unit">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">New</label>
            <input type="new" id="new" class="form-control"  placeholder="New">
          </div>
          {{-- <div class="form-group">
            <label>Id Type</label>
              <select id="idtype" class="form-control">
                <option value="1">Mr</option>
                <option value="2">Mrs</option>
                <option value="3">Ms</option>
                <option value="4">Dr</option>
                <option value="5">Prof</option>
              </select>
          </div> --}}
          {{-- <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
          </div> --}}
          {{-- <div class="form-group">
            <label for="exampleInputFile">File input</label>
            <div class="input-group">
              <div class="custom-file">
                <input type="file" class="custom-file-input" id="exampleInputFile">
                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
              </div>
              <div class="input-group-append">
                <span class="input-group-text">Upload</span>
              </div>
            </div>
          </div> --}}
          {{-- <div class="form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Check me out</label>
          </div> --}}
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
@endsection