@extends('adminmaster')
@section('admincontent')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Product Type</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Product Type</li>
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
                  <th>Name</th>
                  <th style="max-width:400px;overflow:hidden">Description</th>
                  <th>Image</th>
                  <th>Create at</th>
                  <th>Update at</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                @foreach ($producttype as $pt)
                  <tr>
                    <td>{{$pt->id}}</td>
                    <td>{{$pt->name}}</td>
                    <td style="max-width:400px;overflow:hidden">{{$pt->description}}</td>
                    <td>{{$pt->image}}</td>
                    <td>{{$pt->created_at}}</td>
                    <td>{{$pt->updated_at}}</td>
                    <td>
                      <button href="#" type="button" data-user="{{$pt}}" onclick="myFunction()" id="editModal" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                      {{-- <button href="#" title="quick view" data-name="{{$pt}}" class="quick-view-btn" data-toggle="modal" data-target="#exampleModal"> --}}
                        Edit
                      </button>                      
                      /
                      <a type="button" href="{{route('delproducttype',$pt->id)}}" class="btn btn-danger" >
                        Delete
                      </button> 
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
                    //   console.log($(this).data('user')); 
                      $("#idEditUserName").val($(this).data('user').id);
                      $("#full_name").val($(this).data('user').full_name);
                      $("#email").val($(this).data('user').email);
                      $("#password").val($(this).data('user').password);
                      $("#phone").val($(this).data('user').phone);
                      $("#address").val($(this).data('user').address);
                      $("#remember_token").val($(this).data('user').remember_token);
                      
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
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="card-body">
          <div class="form-group">
            <label for="exampleInputEmail1">Id</label>
            <input type="id" id="idEditUserName" class="form-control"  placeholder="Id">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">User Name</label>
            <input type="full_name" id="full_name" class="form-control"  placeholder="Product Name">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Email</label>
            <input type="email" id="email" class="form-control"  placeholder="Id Type">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Password</label>
            <input type="password" id="password" class="form-control"  placeholder="Description">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Number Phone</label>
            <input type="phone" id="phone" class="form-control"  placeholder="Unit Price">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Address</label>
            <input type="address" id="address" class="form-control"  placeholder="Promotion Price">
          </div>
          {{-- <div class="form-group">
            <label for="exampleInputEmail1">Image</label>
            <input type="image" id="image" class="form-control"  placeholder="Image">
          </div> --}}
          {{-- <div class="form-group">
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
          </div> --}}
          <div class="form-group">
            <label for="exampleInputEmail1">Token</label>
            <input type="remember_token" id="remember_token" class="form-control"  placeholder="Unit">
          </div>
          {{-- <div class="form-group">
            <label for="exampleInputEmail1">New</label>
            <input type="new" id="new" class="form-control"  placeholder="New">
          </div> --}}
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