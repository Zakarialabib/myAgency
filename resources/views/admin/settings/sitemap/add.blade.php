@extends('layouts.dashboard')

@section('content')

<div class="content-header">
        <div class="container-fluid">
            <div class="row">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">{{ __('Sitemap') }} </h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="fas fa-home"></i>{{ __('Home') }}</a></li>
                <li class="breadcrumb-item">{{ __('Sitemap') }}</li>
                </ol>
            </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                    <div class="card card-primary card-outline">
                            <div class="card-header">
                                <h3 class="card-title mt-1">{{ __('Add Sitemap') }}</h3>
                                <div class="card-tools">
                                    <a href="{{ route('admin.sitemap.index'). '?language=' . $currentLang->code }}" class="btn btn-primary btn-sm">
                                        <i class="fas fa-angle-double-left"></i> {{ __('Back') }}
                                    </a>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <form class="form-horizontal" action="{{ route('admin.sitemap.store') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="filename">

                                    <div class="form-group row">
                                        <label  class="col-sm-12 control-label">{{ __('Sitemap Url') }}<span class="text-danger">*</span></label>
        
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" name="sitemap_url" placeholder="{{ __('Sitemap Url') }}" value="{{ old('sitemap_url') }}">
                                            @if ($errors->has('sitemap_url'))
                                                <p class="text-danger"> {{ $errors->first('sitemap_url') }} </p>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-sm-12">
                                            <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
                                        </div>
                                    </div>
                                
                                </form>
                                
                            </div>
                            <!-- /.card-body -->
                        </div>
            </div>
        </div>
    </div>
    <!-- /.row -->

</section>
@endsection
