<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>হরিখালী উচ্চ বিদ্যালয় পুনর্মিলনী-২০২৬</title>
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- AdminLTE -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.2.0/css/adminlte.min.css">
    <style>
        .payment-card {
            height: 100%;
        }
        @media (max-width: 768px) {
            .form-container {
                margin-top: 20px;
            }
        }
        /* Eye-catchy input borders with real color */
        .form-control, .custom-select {
            border: 1px solid #007bff;
            border-radius: 10px;
            background-color: #f4f8ff; /* Light blue tint */
            transition: all 0.3s ease;
            color: #495057;
            padding: 10px 15px;
            height: auto;
        }
        .form-control:focus, .custom-select:focus {
            border-color: #0056b3;
            background-color: #ffffff;
            box-shadow: 0 0 15px rgba(0, 123, 255, 0.4);
            outline: none;
            transform: translateY(-1px);
        }
        .form-group label {
            font-weight: 700;
            color: #333;
            margin-bottom: 8px;
            display: inline-block;
        }
        /* Custom styling for file inputs */
        input[type="file"].form-control {
            padding: 3px;
            height: auto;
        }
        .card-primary.card-outline {
            border-top: 3px solid #007bff;
        }
    </style>
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
    <!-- Content Wrapper. Contains page content -->
    <div class="container">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">

                    <div class="col-md-12 text-center">
                        <a href="{{url('/')}}"><img src="{{ asset('assets/backend/img/new_logo_PM.jpg') }}" style="height: 120px!important;" alt="hhsr Logo"
                                                    class="img-fluid"> </a>
                        <h1>হরিখালী উচ্চ বিদ্যালয় পুনর্মিলনী - ২০২৬</h1>
                        <p>হরিখালী, সোনাতলা, বগুড়া</p>
                        <h4 class="badge-warning">
                            অনুগ্রহ করে বিকাশ/নগদ নম্বর <b>01711774607</b>-এ “Send Money” করুন এবং <b>ট্রানজেকশন আইডি ও স্ক্রিনশট </b> সংযুক্ত করে ফর্মটি পূরণ করুন।
                        </h4>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">


                    <!-- Membership Form (Right Side) -->
                    <div class="col-md-8 form-container">
                        <!-- general form elements -->
                        <div class="card card-primary">
                            <div class="card-header text-center">
                                <h3 class="card-title float-none">পুনর্মিলনী রেজিস্ট্রেশন ফরম</h3>
                            </div>
                            <!-- /.card-header -->

                            {{-- Success Message --}}
                            @if (session('success'))
                                <div class="alert alert-success mt-3">
                                    {{ session('success') }}
                                </div>
                            @endif

                            {{-- Validation Errors --}}
                            @if ($errors->any())
                                <div class="alert alert-danger mt-3">
                                    <ul class="mb-0">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <!-- form start -->
                            <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>নাম (বাংলায়)</label>
                                                <input type="text" class="form-control" name="name_bn" placeholder="নাম (বাংলায়)">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>নাম (ইংরেজিতে)</label>
                                                <input type="text" class="form-control" name="name_en" placeholder="নাম (ইংরেজিতে)">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>পিতার নাম</label>
                                                <input type="text" class="form-control" name="father_name" placeholder="পিতার নাম">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>মাতার নাম</label>
                                                <input type="text" class="form-control" name="mother_name" placeholder="মাতার নাম">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label>পরীক্ষার সাল </label>
                                        <input type="number" class="form-control" name="batch_passing_year" placeholder="পাশের সাল">
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>বর্তমান ঠিকানা</label>
                                                <textarea class="form-control" rows="3" name="present_address" placeholder="বর্তমান ঠিকানা"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>স্থায়ী ঠিকানা</label>
                                                <textarea class="form-control" rows="3" name="permanent_address" placeholder="স্থায়ী ঠিকানা"></textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>পেশাগত বিবরণ </label>
                                                <textarea class="form-control" rows="3" name="job_description" placeholder="পেশাগত বিবরণ"></textarea>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>মোবাইল নম্বর</label>
                                                <input type="tel" class="form-control" name="mobile" placeholder="মোবাইল নং">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>ইমেইল</label>
                                                <input type="email" class="form-control" name="email" placeholder="ইমেইল">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label>টি-শার্ট সাইজ</label>
                                        <select name="t_shirt_size" class="form-control">
                                            <option value="">নির্বাচন করুন </option>
                                            <option>S</option>
                                            <option>M</option>
                                            <option>L</option>
                                            <option>XL</option>
                                            <option>XXL</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>অতিথি/গেস্ট নিতে আগ্রহী?</label>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="interested_in_guests" id="guest_yes" value="yes">
                                            <label class="form-check-label" for="guest_yes">হ্যাঁ</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="interested_in_guests" id="guest_no" value="no" checked>
                                            <label class="form-check-label" for="guest_no">না</label>
                                        </div>
                                    </div>

                                    <div id="guest_details_section" style="display: none;">
                                        <div class="form-group">
                                            <label>অতিথির সংখ্যা</label>
                                            <input type="number" class="form-control" name="guest_count" id="guest_count" min="1" max="10" placeholder="অতিথির সংখ্যা">
                                        </div>
                                        <div id="guests_container">
                                            <!-- Guest rows will be added here -->
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label>মোট ফি (টাকা)</label>
                                        <input type="text" class="form-control bg-white" name="total_amount" id="total_amount" value="1000" readonly>
                                        <small class="text-muted text-info">সদস্য ফি ১০০০ টাকা + প্রতি অতিথি ৫০০ টাকা</small>
                                    </div>

                                    <div class="form-group">
                                        <label>আপনার ছবি</label>
                                        <input type="file" class="form-control" name="photo" accept=".jpg, .jpeg, .png">
                                    </div>

                                    <div class="form-group">
                                        <label> পেমেন্ট রসিদ</label>
                                        <input type="file" class="form-control" name="payment_receipt_copy" accept=".pdf, .jpg, .jpeg, .png">
                                    </div>
                                    <div class="form-group">
                                        <label> বিকাশ/নগদ মোবাইল নম্বর</label>
                                        <input type="text" class="form-control" name="transaction_mobile_no" placeholder="বিকাশ/নগদ মোবাইল নম্বর" required>
                                    </div>
                                    <div class="form-group">
                                        <label> ট্রানজেকশন আইডি (বিকাশ/নগদ)</label>
                                        <input type="text" class="form-control" name="transaction_id" placeholder="ট্রানজেকশন আইডি লিখুন " required>
                                    </div>
                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox">
                                            <input class="custom-control-input"  name="declaration" type="checkbox" id="declaration" required>
                                            <label for="declaration" class="custom-control-label">
                                                উপরের তথ্যাাদি সঠিক
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <div class="text-center mt-4">
                                        <button type="submit" class="btn btn-primary btn-lg">
                                            <i class="fas fa-paper-plane mr-2"></i>Submit Application
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- Payment Information (Left Side) -->
                    <div class="col-md-4">
                        <div class="card card-secondary payment-card">
                            <div class="card-header">
                                <h3 class="card-title">ফি প্রদানের তথ্য</h3>
                            </div>
                            <div class="card-body">
                                <h4><i class="fas fa-money-bill-wave mr-2"></i>সদস্য ফি</h4>
                                <ul class="list-group list-group-unbordered mb-3">
                                    <li class="list-group-item">
                                        <b>সদস্য ফি</b> <span class="float-right">১,০০০ টাকা</span>
                                    </li>
                                    <li class="list-group-item">
                                        <b>প্রতি অতিথি ফি</b> <span class="float-right">৫০০ টাকা</span>
                                    </li>
                                </ul>

                                <h4><i class="fas fa-university mr-2"></i>পেমেন্ট পদ্ধতি</h4>
                                <div class="payment-methods">

                                    <p><strong>পদ্ধতি ১:</strong> ব্যাংকিং পেমেন্ট </p>
                                    <div class="bank-details bg-light p-3">
                                        <p class="mb-1"><strong>ইসলামী ব্যাংক পিএলসি (এজেন্ট ব্যাংকিং)</strong></p>
                                        <p class="mb-2"> শাখা: হরিখালী বাজার, সোনাতলা, বগুড়া।  </p>

                                        <p class="mb-1"><strong>হিসাবের নামঃ Horikhali Alumni Association 2026</strong></p>
                                        <p class="mb-2"> হিসাবের নাম্বারঃ 20507770233205466</p>
                                        <p class="mb-2"> রাউটিং নাম্বারঃ 125270607</p>
                                    </div>
                                    <br>
                                    <p><strong>পদ্ধতি ২:</strong> মোবাইল ব্যাংকিং পেমেন্ট </p>
                                    <div class="bank-details bg-light p-3">
                                        <p class="mb-1"><strong>বিকাশ নম্বর:</strong></p>
                                        <p class="mb-2">01356-014946</p>

                                        <p class="mb-1"><strong>নগদ নম্বর:</strong></p>
                                        <p class="mb-2">01356-014946</p>

                                    </div>
                                    <br>
                                    <p><strong>Technical Support </strong> </p>
                                    <div class="bank-details bg-light p-3">
                                        <p class="mb-1"><strong>Md. Al-Amin Islam</strong></p>
                                        <p class="mb-2"> 01711774607</p>
                                    </div>

                                </div>

                                <div class="contact-info mt-3">
                                    <h4><i class="fas fa-envelope mr-2"></i>যোগাযোগ</h4>
                                    <p><i class="fas fa-phone mr-2"></i> reunionhhs@gmail.com</p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <footer class="main-footer">
        <strong>Design, Development and Maintenance by datamen</strong>
    </footer>
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.0/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.2.0/js/adminlte.min.js"></script>

<script>
    $(document).ready(function() {
        function calculateTotal() {
            var memberFee = 1000;
            var guestFee = 500;
            var guestCount = 0;

            if ($('input[name="interested_in_guests"]:checked').val() === 'yes') {
                guestCount = parseInt($('#guest_count').val()) || 0;
            }

            var total = memberFee + (guestCount * guestFee);
            $('#total_amount').val(total);
        }

        $('input[name="interested_in_guests"]').change(function() {
            if ($(this).val() == 'yes') {
                $('#guest_details_section').show();
            } else {
                $('#guest_details_section').hide();
                $('#guests_container').empty();
                $('#guest_count').val('');
            }
            calculateTotal();
        });

        $('#guest_count').on('input', function() {
            var count = parseInt($(this).val());
            var container = $('#guests_container');
            container.empty();

            if (count > 0) {
                if (count > 10) {
                    count = 10;
                    $(this).val(10);
                }
                for (var i = 1; i <= count; i++) {
                    var guestHtml = `
                        <div class="card card-outline card-info mt-3">
                            <div class="card-header">
                                <h3 class="card-title">অতিথি ${i}</h3>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>নাম</label>
                                            <input type="text" class="form-control" name="guest_name[]" placeholder="নাম" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>বয়স</label>
                                            <input type="number" class="form-control" name="guest_age[]" placeholder="বয়স" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>সম্পর্ক</label>
                                            <input type="text" class="form-control" name="guest_relation[]" placeholder="সম্পর্ক" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    `;
                    container.append(guestHtml);
                }
            }
            calculateTotal();
        });
    });
</script>
</body>
</html>
