@extends('adminmaster')
@section('admincontent')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Customers</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Customers</li>
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
                  <th >Gender</th>
                  <th>Email</th>
                  <th>Adress</th>
                  <th>Phone number</th>
                  <th>Note</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                @foreach ($customer as $c)
                  <tr>
                    <td>{{$c->id}}</td>
                    <td>{{$c->name}}</td>
                    <td >{{$c->gender}}</td>
                    <td>{{$c->email}}</td>
                    <td>{{$c->address}}</td>
                    <td>{{$c->phone_number}}</td>
                    <td>{{$c->note}}</td>
                    <td>
                      <button href="#" type="button" data-customer="{{$c}}" onclick="myFunction()" id="editModal" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                      {{-- <button href="#" title="quick view" data-name="{{$c}}" class="quick-view-btn" data-toggle="modal" data-target="#exampleModal"> --}}
                        Edit
                      </button>                      
                      /
                      <a type="button" href="{{route('delcustomer',$c->id)}}" class="btn btn-danger" >
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
                      console.log($(this).data('customer')); 
                      $("#idEditCustomerName").val($(this).data('customer').id);
                      $("#customername").val($(this).data('customer').name);
                      $("#gender").val($(this).data('customer').gender);
                      $("#email").val($(this).data('customer').email);
                      $("#address").val($(this).data('customer').address);
                      $("#phone_number").val($(this).data('customer').phone_number);
                      $("#note").val($(this).data('customer').note);
                      
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
            <input type="id" id="idEditCustomerName" class="form-control"  placeholder="Id">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Customer Name</label>
            <input type="customername" id="customername" class="form-control"  placeholder="Product Name">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Gender</label>
            <input type="gender" id="gender" class="form-control"  placeholder="Id Type">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Email</label>
            <input type="email" id="email" class="form-control"  placeholder="Description">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Adress</label>
            <input type="address" id="address" class="form-control"  placeholder="Unit Price">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Phone Number</label>
            <input type="phone_number" id="phone_number" class="form-control"  placeholder="Promotion Price">
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
            <label for="exampleInputEmail1">Note</label>
            <input type="note" id="note" class="form-control"  placeholder="Unit">
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