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
                      {{-- <button href="{{route('clickedit',$c->id)}}" type="button" data-customer="{{$c}}"  onclick="myFunction()" id="editModal" class="btn btn-primary" data-toggle="modal" data-target="#exampleEditModal"> --}}
                      <a href="{{route('getsinglecustomer',$c->id)}}" type="button" data-customer="{{$c}}"  id="editModal" class="btn btn-primary" >
                      {{-- <a href="#" title="quick view" data-name="{{$c}}" class="quick-view-btn" data-toggle="modal" data-target="#exampleModal"> --}}
                        Edit
                      </a>                      
                      /
                      <a type="button" href="{{route('delcustomer',$c->id)}}" class="btn btn-danger" >
                        Delete
                      </button> 
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
  <!-- Add Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form action="{{route('customeraddadmin')}}" method="POST">
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
              <input type="id"  name="idEditCustomerName" class="form-control" disabled placeholder="Id">
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Customer Name</label>
              <input type="customername"  name="customername" class="form-control"  placeholder="Product Name">
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Gender</label>
              <input type="gender"  name="gender" class="form-control"  placeholder="Id Type">
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Email</label>
              <input type="email" name="email" class="form-control"  placeholder="Description">
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Adress</label>
              <input type="address"  name="address" class="form-control"  placeholder="Unit Price">
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Phone Number</label>
              <input type="phone_number"  name="phone_number" class="form-control"  placeholder="Promotion Price">
            </div>
           
            <div class="form-group">
              <label for="exampleInputEmail1">Note</label>
              <input type="note" name="note" class="form-control"  placeholder="Note">
            </div>
           
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