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
                        <li class="breadcrumb-item">Role</li>
                        <li class="breadcrumb-item active">Show</li>
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
                <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10 col-xl-10">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                <a href="{{ route('auth.users.index') }}"><i class="fa fa-users"></i> Users</a> | <a
                                    href="{{ route('auth.users.edit', $user) }}"><i class="fa fa-edit"></i> Edit </a>
                            </h3>
                        </div><!-- /.card-header -->

                        <div class="card-body">
                            <table class="table table-bordered table-hover">
                                <tr>
                                    <th>ID</th>
                                    <td>:</td>
                                    <td>{{ $user->id }}</td>
                                </tr>
                                <tr>
                                    <th>Name</th>
                                    <td>:</td>
                                    <td>{{ $user->name }}</td>
                                </tr>
                                <tr>
                                    <th>Email</th>
                                    <td>:</td>
                                    <td>{{ $user->email }}</td>
                                </tr>
                                <tr>
                                    <th>Email Verified At</th>
                                    <td>:</td>
                                    <td>{{ $user->email_verified_at ? 'Verified' : 'Yet to Verify' }}</td>
                                </tr>
                                <tr>
                                    <th>Assigned Roles</th>
                                    <td>:</td>
                                    <td>
                                        @foreach ($user->roles as $key => $item)
                                            <span class="badge badge-info">{{ $item->name }}</span>
                                        @endforeach
                                    </td>
                                </tr>
                                <tr>
                                    <th>Assigned Permissions</th>
                                    <td>:</td>
                                    <td>
                                        @foreach ($user->roles as $roles)
                                            @foreach ($roles->permissions as $permission)
                                                <span class="badge badge-info">{{ $permission->name }}</span>
                                            @endforeach
                                        @endforeach
                                    </td>
                                </tr>
                                <tr>
                                    <th>Created At</th>
                                    <td>:</td>
                                    <td>{{ $user->created_at }}</td>
                                </tr>
                                <tr>
                                    <th>Updated At</th>
                                    <td>:</td>
                                    <td>{{ $user->updated_at }}</td>
                                </tr>
                            </table>
                        </div><!-- /.card-body -->
                    </div><!-- /.card -->
                </div><!-- /.col -->
            </div><!-- /.row -->

        </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
@endsection

@push('js')
@endpush
