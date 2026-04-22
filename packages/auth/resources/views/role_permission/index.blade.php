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
                        <li class="breadcrumb-item active">Role-Permissions</li>
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
                            <h3 class="card-title"><i class="fa fa-users"></i> Role-Permissions </h3>
                        </div><!-- /.card-header -->

                        <div class="card-body">
                            {{-- @can('role-permission-access') --}}
                            <table id="dt" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Role</th>
                                        <th>Permission</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($roles as $role)
                                        <tr>
                                            <td>{{ $role->id }}</td>
                                            <td>{{ $role->name }}</td>
                                            <td>
                                                @isset($role->permissions)
                                                    @foreach ($role->permissions as $key => $item)
                                                        <span class="badge badge-info">{{ $item->name }}</span>
                                                    @endforeach
                                                @endisset
                                            </td>
                                            <td>
                                                <a href="{{ route('auth.rp.edit', $role->id) }}"
                                                    class="btn btn-sm btn-info"><i class="fas fa-edit"></i> </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                {{-- @else
                                    <p> You are not authorised to view this section.
                                @endcan --}}
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
