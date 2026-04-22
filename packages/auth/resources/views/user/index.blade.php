@extends('backend.layout')

@push('css')
    @include('backend.common.data_table_css')
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
                        <li class="breadcrumb-item active">User</li>
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
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="fa fa-users"></i> <a href="{{ route('auth.users.index') }}"> Users</a> |
                                <a href="{{ route('auth.users.create') }}"><i class="fa fa-plus"></i> Add</a>
                            </h3>
                        </div><!-- /.card-header -->

                        <div class="card-body">
                            <table id="dt" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Verified</th>
                                        <th>Roles</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($users as $user)
                                        <tr>
                                            <td>{{ $user->id }}</td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->email_verified_at ? 'Yes' : 'No' }}</td>
                                            <td>
                                                @foreach ($user->roles as $key => $item)
                                                    <span class="badge badge-info">{{ $item->name }}</span>
                                                @endforeach
                                            </td>
                                            <td>
                                                <a href="{{ route('auth.users.show', $user->id) }}"
                                                    class="btn btn-sm btn-success"><span class="fa fa-eye-slash"></span>
                                                    Show </a>
                                                <a href="{{ route('auth.users.edit', $user->id) }}"
                                                    class="btn btn-sm btn-info"><span class="fa fa-edit"></span> Edit </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
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
    @include('backend.common.data_table_js')
@endpush
