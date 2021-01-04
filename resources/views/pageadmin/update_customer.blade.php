@extends('adminmaster')
@section('admincontent')
<div class="content-wrapper">
    <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Update Customer</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{ route('updatecustomer',$customer[0]->id) }}" method="POST">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            {{-- <input type="hidden" name="_token" value="{{csrf_token()}}"> --}}
          <div class="card-body">
            <div class="form-group">
                
                <label for="exampleInputEmail1">ID</label>
                <input type="id" id="idEditCustomerName" name="idEditCustomerName" value="{{$customer[0]->id}}" class="form-control" disabled placeholder="Id">
               
                {{-- <label for="exampleInputEmail1">{{$sp->name}}</label> --}}
                {{-- <input type="id" id="idEditCustomerName" name="idEditCustomerName"  class="form-control" disabled placeholder="Id"> --}}
              </div>
              <div class="form-group">
                
                <label for="exampleInputEmail1">Name</label>
                <input type="id" id="name" name="name" value="{{$customer[0]->name}}" class="form-control"  placeholder="Id">
                
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Gender</label>
                <input type="gender" id="gender" name="gender" class="form-control" value="{{$customer[0]->gender}}"  placeholder="Id Type">
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Email</label>
                <input type="email" id="email" name="email" class="form-control" value="{{$customer[0]->email}}" placeholder="Description">
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Adress</label>
                <input type="address" id="address" name="address" class="form-control" value="{{$customer[0]->address}}"  placeholder="Unit Price">
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Phone Number</label>
                <input type="phone_number" id="phone_number" name="phone_number" class="form-control"  value="{{$customer[0]->phone_number}}" placeholder="Promotion Price">
              </div>
              
              <div class="form-group">
                <label for="exampleInputEmail1">Note</label>
                <input type="note" id="note" name="note" class="form-control" value="{{$customer[0]->note}}" placeholder="Note">
              </div>
          </div>
          <!-- /.card-body -->
    
          <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
        </form>
      </div>
</div>
@endsection