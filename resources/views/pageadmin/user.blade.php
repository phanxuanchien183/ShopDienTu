@extends('adminmaster')
@section('admincontent')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Users</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Users</li>
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
            @if(count($errors)>0)
                  <div class="alert alert-danger">
                      @foreach ( $errors->all() as $err)
                          {{$err}}
                      @endforeach
              </div>
                  
              @endif
              @if(Session::has('thanhcong'))
                  <div class="alert alert-success">{{Session::get('thanhcong')}}</div>
              @endif
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
                  <th >Email</th>
                  <th>Password</th>
                  <th>Phone Number</th>
                  <th>Address</th>
                  <th>Token</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                @foreach ($user as $u)
                  <tr>
                    <td>{{$u->id}}</td>
                    <td>{{$u->full_name}}</td>
                    <td >{{$u->email}}</td>
                    <td>{{$u->password}}</td>
                    <td>{{$u->phone}}</td>
                    <td>{{$u->address}}</td>
                    <td>{{$u->remember_token}}</td>
                    <td>
                      {{-- <button href="{{route('clickedit',$u->id)}}" type="button" data-customer="{{$u}}"  onclick="myFunction()" id="editModal" class="btn btn-primary" data-toggle="modal" data-target="#exampleEditModal"> --}}
                      <a href="{{route('getsingleuser',$u->id)}}" type="button" data-customer="{{$u}}"  id="editModal" class="btn btn-primary" >
                      {{-- <a href="#" title="quick view" data-name="{{$u}}" class="quick-view-btn" data-toggle="modal" data-target="#exampleModal"> --}}
                        Edit
                      </a>                      
                      /
                      <a type="button" href="{{route('deluser',$u->id)}}" class="btn btn-danger" >
                        Delete
                      </button> 
                    </td>
                  </tr>
                @endforeach
                {{-- js insert data in modal product new --}}
                {{-- <script>
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
                </script> --}}
                
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
  <!-- Add Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form action="{{route('useraddadmin')}}" method="POST">
        <input type="hidden" name="_token" value="{{csrf_token()}}">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add Customer</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="card-body">            
            <div class="form-group">
              <label for="exampleInputEmail1">Id</label>
              <input type="id" name="idEditUserName" class="form-control" disabled placeholder="Id">
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">User Name</label>
              <input type="full_name" name="full_name" class="form-control"  placeholder="User Name">
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Email</label>
              <input type="email" name="email" class="form-control"  placeholder="Email">
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Password</label>
              <input type="password" name="password" class="form-control"  placeholder="Password">
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Number Phone</label>
              <input type="phone" name="phone" class="form-control"  placeholder="Number Phone">
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Address</label>
              <input type="address" name="address" class="form-control"  placeholder="Address">
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Token</label>
              <input type="remember_token" name="remember_token" class="form-control"  placeholder="Token">
            </div>
            
            
            <div class="form-group">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
      </form>
    </div>
  </div>
</div>

 
@endsection