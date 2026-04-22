@extends('frontend.layouts.app')

@section('content')
    <!-- Hero Section -->
    <div class="hero-section" style="background-image: url('{{ asset('assets/backend/img/slider.jpg') }}');">
        <div class="hero-overlay"></div>
        <div class="hero-content container px-3">
            <div class="row align-items-center">
                <!-- Left Side: Logo -->
                <div class="col-lg-5 text-center text-lg-left mb-4 mb-lg-0">
                    <img src="{{ asset('assets/backend/img/new_logo_PM.jpg') }}" alt="Reunion Logo" class="img-fluid" style="max-height: 400px; opacity: 0.9; filter: drop-shadow(0 0 10px rgba(255,255,255,0.2));">
                </div>
                <!-- Right Side: Content -->
                <div class="col-lg-7 text-center text-lg-left">
                    <h1 class="display-4 font-weight-bold text-white mb-3">হরিখালী উচ্চ বিদ্যালয় পুনর্মিলনী - ২০২৬</h1>
                    <p class="lead text-white h3 mb-2">পুরোনো স্মৃতি, নতুন বন্ধন</p>
                    <p class="lead text-white h4 mb-4">হরিখালী, সোনাতলা, বগুড়া</p>
                    <div class="mt-4">
                        <a href="{{ route('register') }}" class="btn btn-primary btn-lg m-2 px-5 py-3 shadow">
                            <i class="fas fa-user-plus mr-2"></i>রেজিস্ট্রেশন করুন
                        </a>
                        <a href="#about" class="btn btn-outline-light btn-lg m-2 px-4 py-3">
                            আরও জানুন
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Countdown Section (Optional - can be dynamic later) -->
    <div class="bg-primary py-4">
        <div class="container text-center text-white">
            <h3>আসছে সেই মাহেন্দ্রক্ষণ!</h3>
            <!-- Placeholder for countdown timer -->
        </div>
    </div>

    <!-- About Section -->
    <section id="about" class="py-5 bg-white">
        <div class="container">
            <h2 class="section-title">আমাদের সম্পর্কে</h2>
            <div class="row align-items-center">
                <div class="col-md-6">
                    <img src="{{ asset('assets/backend/img/about.jpg') }}" alt="About Reunion" class="img-fluid rounded shadow">
                </div>
                <div class="col-md-6">
                    <h3 class="mt-3 mt-md-0">স্বাগতম প্রাক্তন শিক্ষার্থী!</h3>
                    <p class="text-justify">
                        হরিখালী উচ্চ বিদ্যালয়ের সকল প্রাক্তন শিক্ষার্থীদের নিয়ে আগামী ২০২৬ সালে অনুষ্ঠিত হতে যাচ্ছে এক বর্ণাঢ্য পুনর্মিলনী।
                        এই আয়োজন শুধু একটি অনুষ্ঠান নয়, বরং হারিয়ে যাওয়া বন্ধুদের খুঁজে পাওয়ার, পুরনো স্মৃতি রোমন্থন করার এবং নতুন করে সম্পর্ক গড়ার এক অনন্য সুযোগ।
                    </p>
                    <p class="text-justify">
                        আসুন, আমরা সবাই মিলে এই দিনটিকে স্মরণীয় করে রাখি। আপনার অংশগ্রহণ আমাদের এই আয়োজনকে সার্থক ও সুন্দর করে তুলবে।
                    </p>
                    <ul class="list-unstyled">
                        <li><i class="fas fa-check-circle text-primary mr-2"></i> স্মৃতিচারণ</li>
                        <li><i class="fas fa-check-circle text-primary mr-2"></i> সাংস্কৃতিক অনুষ্ঠান</li>
                        <li><i class="fas fa-check-circle text-primary mr-2"></i> র‍্যাফেল ড্র</li>
                        <li><i class="fas fa-check-circle text-primary mr-2"></i> প্রীতিভোজ</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="py-5 bg-light">
        <div class="container">
            <div class="row text-center">
                <div class="col-md-3 col-6 mb-4">
                    <div class="counter-box">
                        <i class="fas fa-users fa-3x text-primary mb-3"></i>
                        <h2 class="counter">৫০০০+</h2>
                        <p>প্রাক্তন শিক্ষার্থী</p>
                    </div>
                </div>
                <div class="col-md-3 col-6 mb-4">
                    <div class="counter-box">
                        <i class="fas fa-chalkboard-teacher fa-3x text-success mb-3"></i>
                        <h2 class="counter">৫০+</h2>
                        <p>শিক্ষক-শিক্ষিকা</p>
                    </div>
                </div>
                <div class="col-md-3 col-6 mb-4">
                    <div class="counter-box">
                        <i class="fas fa-history fa-3x text-warning mb-3"></i>
                        <h2 class="counter">৫০+</h2>
                        <p>বছরের ইতিহাস</p>
                    </div>
                </div>
                <div class="col-md-3 col-6 mb-4">
                    <div class="counter-box">
                        <i class="fas fa-calendar-alt fa-3x text-danger mb-3"></i>
                        <h2 class="counter">১</h2>
                        <p>মহা মিলনমেলা</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Schedule Section (Placeholder) -->
    <section id="schedule" class="py-5">
        <div class="container">
            <h2 class="section-title">অনুষ্ঠান সূচি</h2>
            <div class="row">
                <div class="col-md-12 text-center">
                    <div class="alert alert-info">
                        <i class="fas fa-info-circle mr-2"></i> বিস্তারিত অনুষ্ঠান সূচি খুব শীঘ্রই প্রকাশ করা হবে।
                    </div>
                    <!-- Example Timeline -->
                    <div class="timeline d-none">
                        <!-- This can be populated later -->
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Call to Action -->
    <section class="py-5 bg-primary text-white text-center">
        <div class="container">
            <h2 class="mb-3">এখনই রেজিস্ট্রেশন করুন!</h2>
            <p class="lead mb-4">আসনের সংখ্যা সীমিত। দেরি না করে আজই আপনার অংশগ্রহণ নিশ্চিত করুন।</p>
            <a href="{{ route('register') }}" class="btn btn-light btn-lg font-weight-bold">
                রেজিস্ট্রেশন করুন
            </a>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="py-5 bg-light">
        <div class="container">
            <h2 class="section-title">যোগাযোগ</h2>
            <div class="row">
                <div class="col-md-4 text-center mb-4">
                    <div class="card h-100 shadow-sm">
                        <div class="card-body">
                            <i class="fas fa-map-marker-alt fa-2x text-primary mb-3"></i>
                            <h4>ঠিকানা</h4>
                            <p>হরিখালী উচ্চ বিদ্যালয়<br>সোনাতলা, বগুড়া - ৫৮২৬</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 text-center mb-4">
                    <div class="card h-100 shadow-sm">
                        <div class="card-body">
                            <i class="fas fa-phone fa-2x text-primary mb-3"></i>
                            <h4>ফোন</h4>
                            <p>+৮৮ ০১৭০০-০০০০০০<br>+৮৮ ০১৮০০-০০০০০০</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 text-center mb-4">
                    <div class="card h-100 shadow-sm">
                        <div class="card-body">
                            <i class="fas fa-envelope fa-2x text-primary mb-3"></i>
                            <h4>ইমেইল</h4>
                            <p>reunionhhs@gmail.com</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
