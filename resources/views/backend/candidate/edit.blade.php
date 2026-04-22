@extends('backend.layout')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Edit Member Application</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('candidate_list') }}">Member List</a></li>
                        <li class="breadcrumb-item active">Edit Member</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div><!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Edit Registration Form</h3>
                        </div>
                        <!-- /.card-header -->

                        @if ($errors->any())
                            <div class="alert alert-danger mt-3 ml-3 mr-3">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <!-- form start -->
                        <form method="POST" action="{{ route('update_member', $candidate->id) }}" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Name (Bangla)</label>
                                            <input type="text" class="form-control" name="name_bn" value="{{ old('name_bn', $candidate->name_bn) }}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Name (English)</label>
                                            <input type="text" class="form-control" name="name_en" value="{{ old('name_en', $candidate->name_en) }}" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Father's Name</label>
                                            <input type="text" class="form-control" name="father_name" value="{{ old('father_name', $candidate->father_name) }}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Mother's Name</label>
                                            <input type="text" class="form-control" name="mother_name" value="{{ old('mother_name', $candidate->mother_name) }}" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Passing Year / Batch</label>
                                            <input type="text" class="form-control" name="batch_passing_year" value="{{ old('batch_passing_year', $candidate->batch_passing_year) }}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Application Status</label>
                                            <select name="application_status" class="form-control" required>
                                                <option value="Pending" {{ old('application_status', $candidate->application_status) == 'Pending' ? 'selected' : '' }}>Pending</option>
                                                <option value="Approved" {{ old('application_status', $candidate->application_status) == 'Approved' ? 'selected' : '' }}>Approved</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Present Address</label>
                                            <textarea class="form-control" rows="3" name="present_address" required>{{ old('present_address', $candidate->present_address) }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Permanent Address</label>
                                            <textarea class="form-control" rows="3" name="permanent_address" required>{{ old('permanent_address', $candidate->permanent_address) }}</textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>Job Description</label>
                                    <textarea class="form-control" rows="3" name="job_description">{{ old('job_description', $candidate->job_description) }}</textarea>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Mobile Number</label>
                                            <input type="tel" class="form-control" name="mobile" value="{{ old('mobile', $candidate->mobile) }}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input type="email" class="form-control" name="email" value="{{ old('email', $candidate->email) }}" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>T-Shirt Size</label>
                                            <select name="t_shirt_size" class="form-control" required>
                                                <option value="">Select Size</option>
                                                @foreach(['S', 'M', 'L', 'XL', 'XXL'] as $size)
                                                    <option value="{{ $size }}" {{ old('t_shirt_size', $candidate->t_shirt_size) == $size ? 'selected' : '' }}>{{ $size }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Total Amount (BDT)</label>
                                            <input type="number" class="form-control" name="total_amount" value="{{ old('total_amount', $candidate->total_amount) }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Transaction ID</label>
                                            <input type="text" class="form-control" name="transaction_id" value="{{ old('transaction_id', $candidate->transaction_id) }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>Interested in Guests?</label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="interested_in_guests" id="guest_yes" value="yes" {{ old('interested_in_guests', $candidate->interested_in_guests) == 'yes' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="guest_yes">Yes</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="interested_in_guests" id="guest_no" value="no" {{ old('interested_in_guests', $candidate->interested_in_guests) == 'no' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="guest_no">No</label>
                                    </div>
                                </div>

                                <div id="guest_details_section" style="{{ old('interested_in_guests', $candidate->interested_in_guests) == 'yes' ? '' : 'display: none;' }}">
                                    <div class="form-group">
                                        <label>Guest Count</label>
                                        <input type="number" class="form-control" name="guest_count" id="guest_count" min="0" max="10" value="{{ old('guest_count', $candidate->guest_count) }}">
                                    </div>
                                    <div id="guests_container">
                                        @if($candidate->guest_details)
                                            @foreach($candidate->guest_details as $index => $guest)
                                                <div class="card card-outline card-info mt-3">
                                                    <div class="card-header">
                                                        <h3 class="card-title">Guest {{ $index + 1 }}</h3>
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label>Name</label>
                                                                    <input type="text" class="form-control" name="guest_name[]" value="{{ $guest['name'] }}" required>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label>Age</label>
                                                                    <input type="number" class="form-control" name="guest_age[]" value="{{ $guest['age'] }}" required>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label>Relation</label>
                                                                    <input type="text" class="form-control" name="guest_relation[]" value="{{ $guest['relation'] }}" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>

                                <div class="row mt-4">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Update Photo</label>
                                            <input type="file" class="form-control" name="photo" accept=".jpg, .jpeg, .png">
                                            @if($candidate->photo)
                                                <div class="mt-2">
                                                    <img src="{{ asset('storage/' . $candidate->photo) }}" width="100" class="img-thumbnail">
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Update Payment Receipt</label>
                                            <input type="file" class="form-control" name="payment_receipt_copy" accept=".pdf, .jpg, .jpeg, .png">
                                            @if($candidate->payment_receipt_copy)
                                                <div class="mt-2">
                                                    <a href="{{ asset('storage/' . $candidate->payment_receipt_copy) }}" target="_blank">View Current Receipt</a>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer text-center">
                                <button type="submit" class="btn btn-primary btn-lg">Update Member Details</button>
                                <a href="{{ route('candidate_list') }}" class="btn btn-secondary btn-lg">Cancel</a>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </section>
@endsection

@push('js')
<script>
    $(document).ready(function() {
        $('input[name="interested_in_guests"]').change(function() {
            if ($(this).val() == 'yes') {
                $('#guest_details_section').show();
            } else {
                $('#guest_details_section').hide();
                $('#guests_container').empty();
                $('#guest_count').val(0);
            }
        });

        $('#guest_count').on('input', function() {
            var count = parseInt($(this).val());
            var container = $('#guests_container');
            var currentCount = container.children('.card').length;

            if (count > currentCount) {
                for (var i = currentCount + 1; i <= count; i++) {
                    var guestHtml = `
                        <div class="card card-outline card-info mt-3">
                            <div class="card-header">
                                <h3 class="card-title">Guest ${i}</h3>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Name</label>
                                            <input type="text" class="form-control" name="guest_name[]" placeholder="Name" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Age</label>
                                            <input type="number" class="form-control" name="guest_age[]" placeholder="Age" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Relation</label>
                                            <input type="text" class="form-control" name="guest_relation[]" placeholder="Relation" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    `;
                    container.append(guestHtml);
                }
            } else if (count < currentCount) {
                container.children('.card').slice(count).remove();
            }
        });
    });
</script>
@endpush
