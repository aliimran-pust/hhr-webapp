@extends('backend.layout')

@push('css')
    <link href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
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
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                <a href="{{ route('auth.roles.index') }}"><i class="fa fa-users"></i> Roles</a> | <a href="{{ route('auth.roles.edit', $role->id) }}"><i class="fa fa-edit"></i> Edit </a>
                            </h3>
                        </div><!-- /.card-header -->

                        <div class="card-body">
                            <table class="table table-bordered table-hover">
                                <tr>
                                    <th>ID</th>
                                    <td>:</td>
                                    <td>{{ $role->id }}</td>
                                </tr>
                                <tr>
                                    <th>Name</th>
                                    <td>:</td>
                                    <td>{{ $role->name }}</td>
                                </tr>

                                <tr>
                                    <th>Created At</th>
                                    <td>:</td>
                                    <td>{{ $role->created_at }}</td>
                                </tr>
                                <tr>
                                    <th>Updated At</th>
                                    <td>:</td>
                                    <td>{{ $role->updated_at }}</td>
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
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>

    <script>
    $(document).ready(function() {
        // data-tables
        $('#dataTbl').DataTable({
            "order": [[0, "desc"]]
        });
    } );
    </script>
@endpush
