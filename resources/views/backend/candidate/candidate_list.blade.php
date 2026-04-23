@extends('backend.layout')

@push('css')
    <link href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css"/>
@endpush

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Member Application List</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item">Member List</li>
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
                                <i class="fa fa-list"></i> Member Application List
                            </h3>
                        </div> <!-- /.card-header -->

                        <div class="card-body">
                            @if(Session::has('success'))
                                <div class="alert alert-success" role="alert">
                                    {{ Session::get('success') }}
                                </div>
                            @endif

                            @if(Session::has('error'))
                                <div class="alert alert-danger" role="alert">
                                    {{ Session::get('error') }}
                                </div>
                            @endif

                            <div class="mb-3">
                                <a href="{{ route('candidate.export.excel') }}" class="btn btn-success">
                                    <i class="fas fa-file-excel mr-1"></i> Download Excel (Full Details)
                                </a>
                                <a href="{{ route('candidate.export.pdf') }}" class="btn btn-danger">
                                    <i class="fas fa-file-pdf mr-1"></i> Download PDF
                                </a>
                            </div>


                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="dataTbl" class="table table-bordered table-hover">
                                            <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Name (EN)</th>
                                                <th>Batch</th>
                                                <th>Mobile</th>
                                                <th>Total Amount</th>
                                                <th>Transaction ID</th>
                                                <th>Request Date</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>

                                            <tbody>
                                            @foreach ($candidates as $item)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $item->name_en }}</td>
                                                    <td>{{ $item->batch_passing_year }}</td>
                                                    <td>{{ $item->mobile }}</td>
                                                    <td>{{ $item->total_amount }}</td>

                                                    <td>{{ $item->transaction_id }}</td>
                                                    <td>{{ $item->created_at->format('d/m/Y') }}</td>
                                                    <td>
                                                        @if($item->application_status === 'Approved')
                                                            <span class="badge badge-success">{{ $item->application_status }} </span>
                                                        @else
                                                            <span class="badge badge-warning">{{ $item->application_status }} </span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <a href="{{ route('view_details_member', $item->id) }}"
                                                           class="btn btn-xs btn-primary mr-1"><span class="fa fa-eye"></span>
                                                            View </a>
                                                        <a href="{{ route('edit_member', $item->id) }}"
                                                           class="btn btn-xs btn-info mr-1"><span class="fa fa-edit"></span>
                                                            Edit </a>
                                                        <a href="{{ route('candidate.id_card', $item->id) }}"
                                                           class="btn btn-xs btn-success"><span class="fa fa-id-card"></span>
                                                            Id Card </a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div><!-- /.card-body -->

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
        $(document).ready(function () {
            $('#dataTbl').DataTable();
        });
    </script>
@endpush
