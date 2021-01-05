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
                      <a href="#" type="button" data-customer="{{$p}}"  id="editModal" class="btn btn-primary" >
                      {{-- <a href="#" title="quick view" data-name="{{$p}}" class="quick-view-btn" data-toggle="modal" data-target="#exampleModal"> --}}
                        Edit
                      </a>                      
                      /
                      <a type="button" href="{{route('delproduct',$p->id)}}" class="btn btn-danger" >
                        Delete
                      </a> 
                    </td>
                  </tr>
                @endforeach
                
                
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
      <form action="{{route('productaddadmin')}}" method="POST">
        <input type="hidden" name="_token" value="{{csrf_token()}}">
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
            <input type="id" name="idEditProductName" class="form-control"  placeholder="Id">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Product Name</label>
            <input type="productname" name="productname" class="form-control"  placeholder="Product Name">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Id Type</label>
            <input type="idtype" name="idtype" class="form-control"  placeholder="Id Type">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Description</label>
            <input type="description" name="description" class="form-control"  placeholder="Description">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Unit Price</label>
            <input type="unitprice" name="unitprice" class="form-control"  placeholder="Unit Price">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Promotion Price</label>
            <input type="promotionprice" name="promotionprice" class="form-control"  placeholder="Promotion Price">
          </div>
          
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
            <input type="unit" name="unit" class="form-control"  placeholder="Unit">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">New</label>
            <input type="new" name="new" class="form-control"  placeholder="New">
          </div>
          
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </form>
    </div>
  </div>
</div>
@endsection