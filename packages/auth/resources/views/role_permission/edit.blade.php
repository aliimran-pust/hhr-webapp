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
                        <li class="breadcrumb-item">Role-Permissions</li>
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
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                    <!-- Horizontal Form -->
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">
                                <a href="{{ route('auth.rp.index') }}"><i class="fa fa-users"></i> URP </a>
                            </h3>

                            @if (Session::has('message'))
                                {{ request()->session()->pull('message') }}
                            @endif

                            @if (Session::has('error'))
                                {{ request()->session()->pull('error') }}
                            @endif
                        </div> <!-- /.card-header -->

                        <!-- form start -->
                        <form method="post" action="{{ route('auth.rp.update', $role->id) }}" class="form-horizontal"
                            role="form">
                            @csrf

                            @method('PUT')

                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="role_name" class="col-sm-4 col-form-label">Role Name </label>
                                    <div class="col-sm-4">
                                        <input type="hidden" name="role_id" value="{{ $role->id }}">

                                        <input type="text" name="role_name" value="{{ $role->name }}"
                                            class="form-control @error('role_name') is-invalid @enderror" readonly>

                                        @error('role_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="permissions" class="col-sm-4 col-form-label">Update Permissions</label>
                                    <div class="col-sm-4">
                                        @foreach ($permissions as $id => $permission)
                                            <div class="form-check">
                                                <input type="checkbox" name="permissions[]" value="{{ $id }}"
                                                       class="form-check-input @error('permissions') is-invalid @enderror"
                                                    {{ in_array($id, old('permissions', [])) || (isset($role) && $role->permissions->contains($id)) ? 'checked' : '' }}>
                                                <label class="form-check-label">{{ $permission }}</label>
                                            </div>
                                        @endforeach
                                        @error('permissions')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div><!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" name="btnRP" class="btn btn-warning mb-2"><i
                                        class="fa fa-save"></i> Update </button>
                                <a href="{{ route('auth.rp.index') }}" class="btn btn-default float-right">Cancel</a>
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
