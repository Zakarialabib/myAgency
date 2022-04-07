@extends('layouts.dashboard')

@section('content')

<div class="content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">{{ __('General Settings') }}</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="fas fa-home"></i>{{ __('General Settings') }}</a></li>
                    <li class="breadcrumb-item">{{ __('Section Title') }}</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">{{ __('Update Section Title') }} </h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="card-body">
                        <form class="form-horizontal" action="{{ route('admin.settings.updateGsettings') }}" method="POST">
                            @csrf
                            
                            <div class="form-group row">
                                <label class="col-sm-2 control-label">{{ __('Education Title') }} <span
                                        class="text-danger">*</span></label>

                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="education_title" value="{{ $setting->education_title }}" placeholder="{{ __('Education Title') }}">
                                    @if ($errors->has('education_title'))
                                    <p class="text-danger"> {{ $errors->first('education_title') }} </p>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 control-label">{{ __('Experince Title') }}<span
                                        class="text-danger">*</span></label>

                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="experince_title" value="{{ $setting->experince_title }}" placeholder="{{ __('Experince Title') }}">
                                    @if ($errors->has('experince_title'))
                                    <p class="text-danger"> {{ $errors->first('experince_title') }} </p>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 control-label">{{ __('Service Title') }}<span
                                        class="text-danger">*</span></label>

                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="service_title" value="{{ $setting->service_title }}" placeholder="{{ __('Service Title') }}">
                                    @if ($errors->has('service_title'))
                                    <p class="text-danger"> {{ $errors->first('service_title') }} </p>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 control-label">{{ __('Portfolio Title') }}<span
                                        class="text-danger">*</span></label>

                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="portfolio_title" value="{{ $setting->portfolio_title }}" placeholder="{{ __('Portfolio Title') }}">
                                    @if ($errors->has('portfolio_title'))
                                    <p class="text-danger"> {{ $errors->first('portfolio_title') }} </p>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 control-label">{{ __('Testimonial Title') }}<span
                                        class="text-danger">*</span></label>

                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="testimonial_title" value="{{ $setting->testimonial_title }}" placeholder="{{ __('Testimonial Title') }}">
                                    @if ($errors->has('testimonial_title'))
                                    <p class="text-danger"> {{ $errors->first('testimonial_title') }} </p>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 control-label">{{ __('Blog Title') }}<span class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="blog_title" value="{{ $setting->blog_title }}" placeholder="{{ __('Blog Title') }}">
                                    @if ($errors->has('blog_title'))
                                    <p class="text-danger"> {{ $errors->first('blog_title') }} </p>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 control-label">{{ __('Contact Title') }}<span
                                        class="text-danger">*</span></label>

                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="contact_title" value="{{ $setting->contact_title }}" placeholder="{{ __('Contact Title') }}">
                                    @if ($errors->has('contact_title'))
                                    <p class="text-danger"> {{ $errors->first('contact_title') }} </p>
                                    @endif
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <div class="offset-sm-2 col-sm-10">
                                    <button type="submit" class="btn bg-pink-500 text-white active:bg-pink-600 focus:ring-pink-500">{{ __('Update') }}</button>
                                </div>
                            </div>

                        </form>

                    </div>
                    <!-- /.box-body -->
                </div>

            </div>
            <!-- /.col -->
        </div>
    </div>


</section>

@endsection
