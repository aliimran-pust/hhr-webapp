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
                        <li class="breadcrumb-item active">Role</li>
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
                            <h3 class="card-title"><i class="fa fa-users"></i> Roles | <a
                                    href="{{ route('auth.roles.create') }}"><i class="fa fa-plus"></i> Add</a> </h3>
                        </div><!-- /.card-header -->

                        <div class="card-body">
                            <table id="dt" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Created_at</th>
                                        <th>Updated_at</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($roles as $role)
                                        <tr>
                                            <td>{{ $role->id }}</td>
                                            <td>{{ $role->name }}</td>
                                            <td>{{ $role->created_at}}</td>
                                            <td>{{ $role->updated_at}}</td>
                                            <td>
                                                <a href="{{ route('auth.roles.show', $role->id) }}"
                                                    class="btn btn-sm btn-success"><span class="fa fa-eye-slash"></span>
                                                    Show</a>
                                                <a href="{{ route('auth.roles.edit', $role->id) }}"
                                                    class="btn btn-sm btn-info"><span class="fa fa-edit"></span> Edit</a>
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
