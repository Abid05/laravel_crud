@extends('layouts.admin')
@section('admin.content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Password Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
              <li class="breadcrumb-item active">Password Change</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Info boxes -->
        <div class="row">
          <div class="col-12">
            <div class="card card-primary">
                <div class="card-header">
                <h3 class="card-title">Change Your Password</h3>
                </div>
            
                <form action="{{ route('admin.password.update') }}" method="POST">
                  @csrf
                  <div class="card-body">
                    <div class="form-group">
                      <label for="InputPassword1">Old Password</label>
                      <input type="password" class="form-control" name="old_password" id="InputPassword1" placeholder="Old Password">
                    </div>
                    <div class="form-group">
                      <label for="InputPassword2">New Password</label>
                      <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="InputPassword2" placeholder="New Password">
                      
                      @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                    </div>

                    <div class="form-group">
                      <label for="InputPassword3">Confirm Password</label>
                      <input type="password" class="form-control" name="password_confirmation" id="InputPassword3" placeholder="Confirm Password">
                    </div>
                  </div>
                  
                  <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Update Password</button>
                  </div>
                </form>
              </div>
          </div>
        </div>

      </div>
    </section>
  </div>
  <!-- /.content-wrapper -->
@endsection