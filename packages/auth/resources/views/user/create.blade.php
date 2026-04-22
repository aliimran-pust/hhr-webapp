@extends('backend.layout')

@push('css')
    @include('backend.common.select2css')
@endpush

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Dashboard</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item">User</li>
                        <li class="breadcrumb-item active">Create</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div><!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Info boxes -->
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 col-xl-8">
                    <!-- Horizontal Form -->
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">
                                <a href="{{ route('auth.users.index') }}"><i class="fa fa-users"></i> Users</a>
                            </h3>
                        </div> <!-- /.card-header -->

                        <!-- form start -->
                        <form method="post" action="{{ route('auth.users.store') }}" class="form-horizontal"
                            role="form">
                            @csrf
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="name" class="col-sm-4 col-form-label">Name</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="name" value="{{ old('name') }}"
                                            class="form-control @error('name') is-invalid @enderror">

                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="email" class="col-sm-4 col-form-label">Email</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="email" value="{{ old('email') }}"
                                            class="form-control @error('email') is-invalid @enderror">

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="password" class="col-sm-4 col-form-label">Password</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="password" value="{{ old('password') }}"
                                            class="form-control @error('password') is-invalid @enderror">

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="password_confirmation" class="col-sm-4 col-form-email">Confirm
                                        Password</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="password_confirmation"
                                            value="{{ old('password_confirmation') }}"
                                            class="form-control @error('password_confirmation') is-invalid @enderror">

                                        @error('password_confirmation')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="roles" class="col-sm-4 col-form-email">Select Roles</label>
                                    <div class="col-sm-8">
                                        <select name="roles[]"
                                            class="form-control @error('roles') is-invalid @enderror select2"
                                            multiple="multiple">
                                            <option>Select Roles</option>
                                            @foreach ($roles as $id => $roles)
                                                <option value="{{ $id }}"
                                                    {{ in_array($id, old('roles', [])) ? 'selected' : '' }}>
                                                    {{ $roles }}</option>
                                            @endforeach
                                        </select>

                                        @error('roles')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div><!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" name="btnUser" class="btn btn-warning mb-2"><i
                                        class="fa fa-save"></i> Add </button>
                                <a href="{{ route('auth.users.index') }}" class="btn btn-default float-right">Cancel</a>
                            </div><!-- /.card-footer -->
                        </form>
                    </div><!-- /.card -->
                </div><!-- /.col -->
            </div><!-- /.row -->

        </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
@endsection

@push('js')
    @include('backend.common.select2js')
@endpush
