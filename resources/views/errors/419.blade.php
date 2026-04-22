@extends('backend.layout')

@section('content')
    <!-- Start Content -->
    <div id="content">
        <div class="container">
            <div class="page-content" style="text-align:justify;">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <div class="warning">
                            <h1>Page Expired!. Please Go back and reload your page.</h1>

                            <br/><br/>
                            {{-- <a href="{{ url()->previous()  }}" style="text-decoration: none; font-size: 14px;">Click Here To Refresh</a> --}}
                        </div>
                    </div>
                </div>
            </div><!-- End page content -->
        </div>
    </div>
    <!-- End content -->
@endsection
