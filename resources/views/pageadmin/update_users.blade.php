@extends('adminmaster')
@section('admincontent')
<div class="content-wrapper">
    <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Update User</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{ route('updateuser',$user[0]->id) }}" method="POST">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            {{-- <input type="hidden" name="_token" value="{{csrf_token()}}"> --}}
          <div class="card-body">
            <div class="form-group">
                <label for="exampleInputEmail1">Id</label>
                <input type="id" name="idEditUserName" value="{{$user[0]->id}}" class="form-control"  placeholder="Id">
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">User Name</label>
                <input type="full_name" name="full_name" value="{{$user[0]->full_name}}" class="form-control"  placeholder="User Name">
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Email</label>
                <input type="email" name="email" value="{{$user[0]->email}}" class="form-control"  placeholder="Email">
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Password</label>
                <input type="password" name="password" value="{{$user[0]->password}}" class="form-control"  placeholder="Password">
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Number Phone</label>
                <input type="phone" name="phone" value="{{$user[0]->phone}}" class="form-control"  placeholder="Number Phone">
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Address</label>
                <input type="address" name="address" value="{{$user[0]->address}}" class="form-control"  placeholder="Address">
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Token</label>
                <input type="remember_token" name="remember_token" value="{{$user[0]->remember_token}}" class="form-control"  placeholder="Token">
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