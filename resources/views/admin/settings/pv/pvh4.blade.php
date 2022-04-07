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
                <form class="form-horizontal" action="{{ route('admin.pagevisibilityh4.update') }}" method="POST">
                    @csrf
                    
                        <div class="card card-primary card-outline">
                            <div class="card-header">
                                <h3 class="card-title">
                                    {{ __('Theme 4 Visibility') }}
                                </h3>
                                <div class="card-tools">
                                    <a href="{{ route('admin.pagevisibility') }}" class="btn bg-pink-500 text-white active:bg-pink-600 focus:ring-pink-500 btn-sm">
                                        <i class="fas fa-angle-double-left"></i> {{ __('Back') }}
                                    </a>
                                </div>
                                </div>
                            <div class="card-body">
                                <div class="form-group row">
                                    <label class="col-sm-5 control-label">{{ __('Hero Section') }}<span
                                                class="text-danger">*</span></label>
                                    <div class="col-sm-7">
                                        <input type="checkbox" {{ $visibility->is_t4_hero_section == '1' ? 'checked' : '' }} data-size="large" name="is_t4_hero_section" data-bootstrap-switch data-off-color="danger" data-on-color="primary" data-on-text="Visible" data-label-text="<i class='fas fa-mouse'></i>"  data-off-text="Invisible">
                                        @if ($errors->has('is_t4_hero_section'))
                                            <p class="text-danger"> {{ $errors->first('is_t4_hero_section') }} </p>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-5 control-label">{{ __('Client Section') }}<span
                                                class="text-danger">*</span></label>
                                    <div class="col-sm-7">
                                        <input type="checkbox" {{ $visibility->is_t4_client_section == '1' ? 'checked' : '' }} data-size="large" name="is_t4_client_section" data-bootstrap-switch data-off-color="danger" data-on-color="primary" data-on-text="Visible" data-label-text="<i class='fas fa-mouse'></i>"  data-off-text="Invisible">
                                        @if ($errors->has('is_t4_client_section'))
                                            <p class="text-danger"> {{ $errors->first('is_t4_client_section') }} </p>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-5 control-label">{{ __('About Section') }}<span
                                                class="text-danger">*</span></label>
                                    <div class="col-sm-7">
                                        <input type="checkbox" {{ $visibility->is_t4_about_section == '1' ? 'checked' : '' }} data-size="large" name="is_t4_about_section" data-bootstrap-switch data-off-color="danger" data-on-color="primary" data-on-text="Visible" data-label-text="<i class='fas fa-mouse'></i>"  data-off-text="Invisible">
                                        @if ($errors->has('is_t4_about_section'))
                                            <p class="text-danger"> {{ $errors->first('is_t4_about_section') }} </p>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-5 control-label">{{ __('Feature Section') }}<span
                                                class="text-danger">*</span></label>
                                    <div class="col-sm-7">
                                        <input type="checkbox" {{ $visibility->is_t4_feature_section == '1' ? 'checked' : '' }} data-size="large" name="is_t4_feature_section" data-bootstrap-switch data-off-color="danger" data-on-color="primary" data-on-text="Visible" data-label-text="<i class='fas fa-mouse'></i>"  data-off-text="Invisible">
                                        @if ($errors->has('is_t4_feature_section'))
                                            <p class="text-danger"> {{ $errors->first('is_t4_feature_section') }} </p>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-5 control-label">{{ __('Who We Are Section') }}<span
                                                class="text-danger">*</span></label>
                                    <div class="col-sm-7">
                                        <input type="checkbox" {{ $visibility->is_t4_who_we_are_section == '1' ? 'checked' : '' }} data-size="large" name="is_t4_who_we_are_section" data-bootstrap-switch data-off-color="danger" data-on-color="primary" data-on-text="Visible" data-label-text="<i class='fas fa-mouse'></i>"  data-off-text="Invisible">
                                        @if ($errors->has('is_t4_who_we_are_section'))
                                            <p class="text-danger"> {{ $errors->first('is_t4_who_we_are_section') }} </p>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-5 control-label">{{ __('Intro Video Section') }}<span
                                                class="text-danger">*</span></label>
                                    <div class="col-sm-7">
                                        <input type="checkbox" {{ $visibility->is_t4_intro_video_section == '1' ? 'checked' : '' }} data-size="large" name="is_t4_intro_video_section" data-bootstrap-switch data-off-color="danger" data-on-color="primary" data-on-text="Visible" data-label-text="<i class='fas fa-mouse'></i>"  data-off-text="Invisible">
                                        @if ($errors->has('is_t4_intro_video_section'))
                                            <p class="text-danger"> {{ $errors->first('is_t4_intro_video_section') }} </p>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-5 control-label">{{ __('Portfolio Section') }}<span
                                                class="text-danger">*</span></label>
                                    <div class="col-sm-7">
                                        <input type="checkbox" {{ $visibility->is_t4_portfolio_section == '1' ? 'checked' : '' }} data-size="large" name="is_t4_portfolio_section" data-bootstrap-switch data-off-color="danger" data-on-color="primary" data-on-text="Visible" data-label-text="<i class='fas fa-mouse'></i>"  data-off-text="Invisible">
                                        @if ($errors->has('is_t4_portfolio_section'))
                                            <p class="text-danger"> {{ $errors->first('is_t4_portfolio_section') }} </p>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-5 control-label">{{ __('Counter Section') }}<span
                                                class="text-danger">*</span></label>
                                    <div class="col-sm-7">
                                        <input type="checkbox" {{ $visibility->is_t4_counter_section == '1' ? 'checked' : '' }} data-size="large" name="is_t4_counter_section" data-bootstrap-switch data-off-color="danger" data-on-color="primary" data-on-text="Visible" data-label-text="<i class='fas fa-mouse'></i>"  data-off-text="Invisible">
                                        @if ($errors->has('is_t4_counter_section'))
                                            <p class="text-danger"> {{ $errors->first('is_t4_counter_section') }} </p>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-5 control-label">{{ __('Testmonial Section') }}<span
                                                class="text-danger">*</span></label>
                                    <div class="col-sm-7">
                                        <input type="checkbox" {{ $visibility->is_t4_testmonial_section == '1' ? 'checked' : '' }} data-size="large" name="is_t4_testmonial_section" data-bootstrap-switch data-off-color="danger" data-on-color="primary" data-on-text="Visible" data-label-text="<i class='fas fa-mouse'></i>"  data-off-text="Invisible">
                                        @if ($errors->has('is_t4_testmonial_section'))
                                            <p class="text-danger"> {{ $errors->first('is_t4_testmonial_section') }} </p>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-5 control-label">{{ __('Faq Section') }}<span
                                                class="text-danger">*</span></label>
                                    <div class="col-sm-7">
                                        <input type="checkbox" {{ $visibility->is_t4_faq_section == '1' ? 'checked' : '' }} data-size="large" name="is_t4_faq_section" data-bootstrap-switch data-off-color="danger" data-on-color="primary" data-on-text="Visible" data-label-text="<i class='fas fa-mouse'></i>"  data-off-text="Invisible">
                                        @if ($errors->has('is_t4_faq_section'))
                                            <p class="text-danger"> {{ $errors->first('is_t4_faq_section') }} </p>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-5 control-label">{{ __('Contact Section') }}<span
                                                class="text-danger">*</span></label>
                                    <div class="col-sm-7">
                                        <input type="checkbox" {{ $visibility->is_t4_contact_section == '1' ? 'checked' : '' }} data-size="large" name="is_t4_contact_section" data-bootstrap-switch data-off-color="danger" data-on-color="primary" data-on-text="Visible" data-label-text="<i class='fas fa-mouse'></i>"  data-off-text="Invisible">
                                        @if ($errors->has('is_t4_contact_section'))
                                            <p class="text-danger"> {{ $errors->first('is_t4_contact_section') }} </p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group row mt-4">
                                <div class="col-sm-12">
                                    <button type="submit" class="btn bg-pink-500 text-white active:bg-pink-600 focus:ring-pink-500 btn-block">{{ __('Update') }}</button>
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
