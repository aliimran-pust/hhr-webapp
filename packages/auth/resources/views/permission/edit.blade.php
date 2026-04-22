@extends('backend.layout')

@push('css')

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
                        <li class="breadcrumb-item">Permissions</li>
                        <li class="breadcrumb-item active">Edit</li>
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
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                    <!-- Horizontal Form -->
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">
                                <a href="{{ route('auth.permissions.index') }}"><i class="fa fa-users"></i> Permissions</a>
                            </h3>

                            @if(Session::has('message'))
                                {{ request()->session()->pull('message') }}
                            @endif

                            @if(Session::has('error'))
                                {{ request()->session()->pull('error') }}
                            @endif
                        </div> <!-- /.card-header -->

                        <!-- form start -->
                        <form method="post" action="{{ route('auth.permissions.update', $permission->id) }}" class="form-horizontal" role="form">
                            @csrf

                            @method('PUT')

                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="name" class="col-sm-4 col-form-label">Permission Name</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="name" value="{{ $permission->name }}" class="form-control @error('name') is-invalid @enderror">

                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="label" class="col-sm-4 col-form-label">Permission Label</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="label" value="{{ $permission->label }}" class="form-control @error('label') is-invalid @enderror">

                                        @error('label')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div><!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" name="btnPermission" class="btn btn-warning mb-2"><i class="fa fa-save"></i> Update </button>
                                <a href="{{ route('auth.permissions.index') }}" class="btn btn-default float-right">Cancel</a>
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

@endpush
