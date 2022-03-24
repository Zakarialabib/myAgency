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
            
            <div class="col-lg-12">
                <form class="form-horizontal" action="{{ route('admin.pagevisibilityh8.update') }}" method="POST">
                    @csrf
                    
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h3 class="card-title">
                                {{ __('Theme 8 Visibility') }}
                            </h3>
                            <div class="card-tools">
                                <a href="{{ route('admin.pagevisibility') }}" class="btn btn-primary btn-sm">
                                    <i class="fas fa-angle-double-left"></i> {{ __('Back') }}
                                </a>
                            </div>
                            </div>
                        <div class="card-body">
                            <div class="form-group row">
                                <label class="col-sm-5 control-label">{{ __('Hero Section') }}<span
                                            class="text-danger">*</span></label>
                                <div class="col-sm-7">
                                    <input type="checkbox" {{$extra_visibility->is_t8_hero_section == '1' ? 'checked' : '' }} data-size="large" name="is_t8_hero_section" data-bootstrap-switch data-off-color="danger" data-on-color="primary" data-on-text="Visible" data-label-text="<i class='fas fa-mouse'></i>"  data-off-text="Invisible">
                                    @if ($errors->has('is_t8_hero_section'))
                                        <p class="text-danger"> {{ $errors->first('is_t8_hero_section') }} </p>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-5 control-label">{{ __('About Section') }}<span
                                            class="text-danger">*</span></label>
                                <div class="col-sm-7">
                                    <input type="checkbox" {{$extra_visibility->is_t8_about_section == '1' ? 'checked' : '' }} data-size="large" name="is_t8_about_section" data-bootstrap-switch data-off-color="danger" data-on-color="primary" data-on-text="Visible" data-label-text="<i class='fas fa-mouse'></i>"  data-off-text="Invisible">
                                    @if ($errors->has('is_t8_about_section'))
                                        <p class="text-danger"> {{ $errors->first('is_t8_about_section') }} </p>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-5 control-label">{{ __('Video Section') }}<span
                                            class="text-danger">*</span></label>
                                <div class="col-sm-7">
                                    <input type="checkbox" {{$extra_visibility->is_t8_video_section == '1' ? 'checked' : '' }} data-size="large" name="is_t8_video_section" data-bootstrap-switch data-off-color="danger" data-on-color="primary" data-on-text="Visible" data-label-text="<i class='fas fa-mouse'></i>"  data-off-text="Invisible">
                                    @if ($errors->has('is_t8_video_section'))
                                        <p class="text-danger"> {{ $errors->first('is_t8_video_section') }} </p>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-5 control-label">{{ __('Service Section') }}<span
                                            class="text-danger">*</span></label>
                                <div class="col-sm-7">
                                    <input type="checkbox" {{$extra_visibility->is_t8_service_section == '1' ? 'checked' : '' }} data-size="large" name="is_t8_service_section" data-bootstrap-switch data-off-color="danger" data-on-color="primary" data-on-text="Visible" data-label-text="<i class='fas fa-mouse'></i>"  data-off-text="Invisible">
                                    @if ($errors->has('is_t8_service_section'))
                                        <p class="text-danger"> {{ $errors->first('is_t8_service_section') }} </p>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-5 control-label">{{ __('Call To Action Section') }}<span
                                            class="text-danger">*</span></label>
                                <div class="col-sm-7">
                                    <input type="checkbox" {{$extra_visibility->is_t8_callaction_section == '1' ? 'checked' : '' }} data-size="large" name="is_t8_callaction_section" data-bootstrap-switch data-off-color="danger" data-on-color="primary" data-on-text="Visible" data-label-text="<i class='fas fa-mouse'></i>"  data-off-text="Invisible">
                                    @if ($errors->has('is_t8_callaction_section'))
                                        <p class="text-danger"> {{ $errors->first('is_t8_callaction_section') }} </p>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-5 control-label">{{ __('Portfolio Section') }}<span
                                            class="text-danger">*</span></label>
                                <div class="col-sm-7">
                                    <input type="checkbox" {{$extra_visibility->is_t8_portfolio_section == '1' ? 'checked' : '' }} data-size="large" name="is_t8_portfolio_section" data-bootstrap-switch data-off-color="danger" data-on-color="primary" data-on-text="Visible" data-label-text="<i class='fas fa-mouse'></i>"  data-off-text="Invisible">
                                    @if ($errors->has('is_t8_portfolio_section'))
                                        <p class="text-danger"> {{ $errors->first('is_t8_portfolio_section') }} </p>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-5 control-label">{{ __('Testimonial Section') }}<span
                                            class="text-danger">*</span></label>
                                <div class="col-sm-7">
                                    <input type="checkbox" {{$extra_visibility->is_t8_testimonial_section == '1' ? 'checked' : '' }} data-size="large" name="is_t8_testimonial_section" data-bootstrap-switch data-off-color="danger" data-on-color="primary" data-on-text="Visible" data-label-text="<i class='fas fa-mouse'></i>"  data-off-text="Invisible">
                                    @if ($errors->has('is_t8_testimonial_section'))
                                        <p class="text-danger"> {{ $errors->first('is_t8_testimonial_section') }} </p>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-5 control-label">{{ __('Team Section') }}<span
                                            class="text-danger">*</span></label>
                                <div class="col-sm-7">
                                    <input type="checkbox" {{$extra_visibility->is_t8_team_section == '1' ? 'checked' : '' }} data-size="large" name="is_t8_team_section" data-bootstrap-switch data-off-color="danger" data-on-color="primary" data-on-text="Visible" data-label-text="<i class='fas fa-mouse'></i>"  data-off-text="Invisible">
                                    @if ($errors->has('is_t8_team_section'))
                                        <p class="text-danger"> {{ $errors->first('is_t8_team_section') }} </p>
                                    @endif
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label class="col-sm-5 control-label">{{ __('Blog Section') }}<span
                                            class="text-danger">*</span></label>
                                <div class="col-sm-7">
                                    <input type="checkbox" {{$extra_visibility->is_t8_blog_section == '1' ? 'checked' : '' }} data-size="large" name="is_t8_blog_section" data-bootstrap-switch data-off-color="danger" data-on-color="primary" data-on-text="Visible" data-label-text="<i class='fas fa-mouse'></i>"  data-off-text="Invisible">
                                    @if ($errors->has('is_t8_blog_section'))
                                        <p class="text-danger"> {{ $errors->first('is_t8_blog_section') }} </p>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-5 control-label">{{ __('Brand Section') }}<span
                                            class="text-danger">*</span></label>
                                <div class="col-sm-7">
                                    <input type="checkbox" {{$extra_visibility->is_t8_brand_section == '1' ? 'checked' : '' }} data-size="large" name="is_t8_brand_section" data-bootstrap-switch data-off-color="danger" data-on-color="primary" data-on-text="Visible" data-label-text="<i class='fas fa-mouse'></i>"  data-off-text="Invisible">
                                    @if ($errors->has('is_t8_brand_section'))
                                        <p class="text-danger"> {{ $errors->first('is_t8_brand_section') }} </p>
                                    @endif
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group row mt-4">
                                <div class="col-sm-12">
                                    <button type="submit" class="btn btn-primary btn-block">{{ __('Update') }}</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div> <!-- /.col -->
    </div>
</section>

@endsection
