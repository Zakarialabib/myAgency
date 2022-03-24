@extends('layouts.dashboard')

@section('content')

<div class="content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">{{ __('Page Visibility') }}</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="fas fa-home"></i>{{ __('Home') }}</a></li>
                    <li class="breadcrumb-item">{{ __('Page Visibility') }}</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-4">
                <a href="{{ route('admin.pagevisibility.pvh1') }}">
                    <div class="card">
                        <div class="card-body text-center" style="color: #555">
                            <h5 class="py-5">
                                <b>Change Theme 1 Visibility</b>
                            </h5>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-4">
                <a href="{{ route('admin.pagevisibility.pvh2') }}">
                    <div class="card">
                        <div class="card-body text-center" style="color: #555">
                            <h5 class="py-5">
                                <b>Change Theme 2 Visibility</b>
                            </h5>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-4">
                <a href="{{ route('admin.pagevisibility.pvh3') }}">
                    <div class="card">
                        <div class="card-body text-center" style="color: #555">
                            <h5 class="py-5">
                                <b>Change Theme 3 Visibility</b>
                            </h5>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-4">
                <a href="{{ route('admin.pagevisibility.pvh4') }}">
                    <div class="card">
                        <div class="card-body text-center" style="color: #555">
                            <h5 class="py-5">
                                <b>Change Theme 4 Visibility</b>
                            </h5>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-4">
                <a href="{{ route('admin.pagevisibility.pvh5') }}">
                    <div class="card">
                        <div class="card-body text-center" style="color: #555">
                            <h5 class="py-5">
                                <b>Change Theme 5 Visibility</b>
                            </h5>
                        </div>
                    </div>
                </a>
            </div>
   
            <div class="col-lg-4">
                <a href="{{ route('admin.pagevisibility.pvh6') }}">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="py-5 text-center" style="color: #555">
                                <b>Change Theme 6 Visibility</b>
                            </h5>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-4">
                <a href="{{ route('admin.pagevisibility.pvh7') }}">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="py-5 text-center" style="color: #555">
                                <b>Change Theme 7 Visibility</b>
                            </h5>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-4">
                <a href="{{ route('admin.pagevisibility.pvh8') }}">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="py-5 text-center" style="color: #555">
                                <b>Change Theme 8 Visibility</b>
                            </h5>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-4">
                <a href="{{ route('admin.pagevisibility.pvh9') }}">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="py-5 text-center" style="color: #555">
                                <b>Change Theme 9 Visibility</b>
                            </h5>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-4">
                <a href="{{ route('admin.pagevisibility.innerpage_visibility') }}">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="py-5 text-center" style="color: #555">
                                <b>Inner Page Visibility</b>
                            </h5>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-4">
                <a href="{{ route('admin.pagevisibility.others_visibility') }}">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="py-5 text-center" style="color: #555">
                                <b>
                                    Otherd Visibility
                                </b>
                            </h5>
                        </div>
                    </div>
                </a>
            </div>
        </div> <!-- /.col -->
    </div>
</section>

@endsection
