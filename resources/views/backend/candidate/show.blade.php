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
                    <h1 class="m-0 text-dark">Member Application Details</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item">Member</li>
                        <li class="breadcrumb-item active">Details</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div><!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">
                    <!-- Profile Image -->
                    <div class="card card-primary card-outline">
                        <div class="card-body box-profile">
                            <div class="text-center">
                                @if($candidate->photo)
                                    <img class="profile-user-img img-fluid img-circle"
                                         src="{{ asset('storage/' . $candidate->photo) }}"
                                         alt="User profile picture">
                                @else
                                    <img class="profile-user-img img-fluid img-circle"
                                         src="https://adminlte.io/themes/v3/dist/img/user1-128x128.jpg"
                                         alt="User profile picture">
                                @endif
                            </div>

                            <h3 class="profile-username text-center">{{ $candidate->name_en }}</h3>
                            <p class="text-muted text-center">{{ $candidate->name_bn }}</p>

                            <ul class="list-group list-group-unbordered mb-3">
                                <li class="list-group-item">
                                    <b>Batch</b> <a class="float-right">{{ $candidate->batch_passing_year }}</a>
                                </li>
                                <li class="list-group-item">
                                    <b>Status</b> <a class="float-right"><span class="badge badge-{{ $candidate->application_status === 'Approved' ? 'success' : 'warning' }}">{{ $candidate->application_status }}</span></a>
                                </li>
                            </ul>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>

                <div class="col-md-9">
                    <div class="card">
                        <div class="card-header p-2">
                            <h3 class="card-title p-2">Application Information</h3>
                        </div><!-- /.card-header -->
                        <div class="card-body">
                            <table class="table table-bordered table-hover">
                                <tr>
                                    <th width="25%">Father's Name</th>
                                    <td>{{ $candidate->father_name }}</td>
                                </tr>
                                <tr>
                                    <th>Mother's Name</th>
                                    <td>{{ $candidate->mother_name }}</td>
                                </tr>
                                <tr>
                                    <th>Job Description</th>
                                    <td>{{ $candidate->job_description }}</td>
                                </tr>
                                <tr>
                                    <th>Mobile</th>
                                    <td>{{ $candidate->mobile }}</td>
                                </tr>
                                <tr>
                                    <th>Email</th>
                                    <td>{{ $candidate->email }}</td>
                                </tr>
                                <tr>
                                    <th>Present Address</th>
                                    <td>{{ $candidate->present_address }}</td>
                                </tr>
                                <tr>
                                    <th>Permanent Address</th>
                                    <td>{{ $candidate->permanent_address }}</td>
                                </tr>
                                <tr>
                                    <th>T-Shirt Size</th>
                                    <td>{{ $candidate->t_shirt_size }}</td>
                                </tr>
                                <tr>
                                    <th>Transaction ID</th>
                                    <td>{{ $candidate->transaction_id }}</td>
                                </tr>
                                <tr>
                                    <th>Application Date</th>
                                    <td>{{ $candidate->created_at->format('d/m/Y h:i A') }}</td>
                                </tr>
                                <tr>
                                    <th>Payment Receipt</th>
                                    <td>
                                        @if($candidate->payment_receipt_copy)
                                            <a href="{{ asset('storage/' . $candidate->payment_receipt_copy) }}"
                                               target="_blank" class="btn btn-sm btn-info">
                                                <i class="fas fa-file-download mr-1"></i> View Receipt
                                            </a>
                                        @else
                                            <span class="text-muted">No receipt</span>
                                        @endif
                                    </td>
                                </tr>
                            </table>

                            @if($candidate->interested_in_guests === 'yes' && $candidate->guest_details)
                                <h4 class="mt-4">Guest Information</h4>
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Age</th>
                                            <th>Relation</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($candidate->guest_details as $guest)
                                            <tr>
                                                <td>{{ $guest['name'] }}</td>
                                                <td>{{ $guest['age'] }}</td>
                                                <td>{{ $guest['relation'] }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            @endif

                            <div class="mt-4">
                                @if($candidate->application_status === 'Pending')
                                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#approveModal">
                                        <i class="fas fa-check"></i> Approve Application
                                    </button>
                                @else
                                    <span class="badge badge-success p-2">
                                        <i class="fas fa-check-circle"></i> Approved on {{ $candidate->updated_at->format('M d, Y') }}
                                    </span>
                                @endif
                            </div>
                        </div><!-- /.card-body -->
                    </div><!-- /.card -->
                </div>
            </div>
        </div>

        <!-- Approval Confirmation Modal -->
        <div class="modal fade" id="approveModal" tabindex="-1" role="dialog" aria-labelledby="approveModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-success text-white">
                        <h5 class="modal-title" id="approveModalLabel">Confirm Approval</h5>
                        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Are you sure you want to approve <strong>{{ $candidate->name_en }}</strong>'s registration?</p>
                        <p><strong>Email:</strong> {{ $candidate->email }}</p>
                        <p><strong>Mobile:</strong> {{ $candidate->mobile }}</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <form action="{{ route('members.approve') }}" method="POST" class="d-inline">
                            @csrf
                            <input type="hidden" name="membership_id" value="{{$candidate->id}}">
                            <button type="submit" class="btn btn-success">
                                <i class="fas fa-check"></i> Confirm Approval
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
