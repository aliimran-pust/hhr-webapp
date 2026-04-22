@extends('backend.layout')

@push('css')

@endpush

@section('content')

    <section class="content">
        <div class="container-fluid">
            <!-- Info boxes -->
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                    <div class="card mb-3">
                        <div class="card-header">
                            <h3>
                                HTTP Not Found!
                            </h3>
                        </div>

                        <div class="card-body">
                            <div class="alert alert-danger" role="alert">
                                The request URL could not be found!
                            </div>
                        </div><!-- /.card-body-->
                    </div><!-- end card-->
                </div>
            </div><!-- /.row -->
        </div><!--/. container-fluid -->
    </section>

@endsection

@push('js')

@endpush
