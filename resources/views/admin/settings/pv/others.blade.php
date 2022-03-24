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
                <form class="form-horizontal" action="{{ route('admin.update_others_visibility.update') }}" method="POST">
                    @csrf
                    
                        <div class="card card-primary card-outline">
                            <div class="card-header">
                                <h3 class="card-title">
                                    {{ __('Other Visibility') }}
                                </h3>
                                <div class="card-tools">
                                    <a href="{{ route('admin.pagevisibility') }}" class="btn btn-primary btn-sm">
                                        <i class="fas fa-angle-double-left"></i> {{ __('Back') }}
                                    </a>
                                </div>
                                </div>
                            <div class="card-body">
                                <div class="form-group row">
                                    <label class="col-sm-5 control-label">{{ __('Social Share Blog Details') }}<span
                                                class="text-danger">*</span></label>
                                    <div class="col-sm-7">
                                        <input type="checkbox" {{ $visibility->is_blog_share_links == '1' ? 'checked' : '' }} data-size="large" name="is_blog_share_links" data-bootstrap-switch data-off-color="danger" data-on-color="primary" data-on-text="Visible" data-label-text="<i class='fas fa-mouse'></i>"  data-off-text="Invisible">
                                        @if ($errors->has('is_blog_share_links'))
                                            <p class="text-danger"> {{ $errors->first('is_blog_share_links') }} </p>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-5 control-label">{{ __('Social Share Shop Details') }}<span
                                                class="text-danger">*</span></label>
                                    <div class="col-sm-7">
                                        <input type="checkbox" {{ $visibility->is_shop_share_links == '1' ? 'checked' : '' }} data-size="large" name="is_shop_share_links" data-bootstrap-switch data-off-color="danger" data-on-color="primary" data-on-text="Visible" data-label-text="<i class='fas fa-mouse'></i>"  data-off-text="Invisible">
                                        @if ($errors->has('is_shop_share_links'))
                                            <p class="text-danger"> {{ $errors->first('is_shop_share_links') }} </p>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-5 control-label">{{ __('Cooki Alert') }}<span
                                                class="text-danger">*</span></label>
                                    <div class="col-sm-7">
                                        <input type="checkbox" {{ $visibility->is_cooki_alert == '1' ? 'checked' : '' }} data-size="large" name="is_cooki_alert" data-bootstrap-switch data-off-color="danger" data-on-color="primary" data-on-text="Visible" data-label-text="<i class='fas fa-mouse'></i>"  data-off-text="Invisible">
                                        @if ($errors->has('is_cooki_alert'))
                                            <p class="text-danger"> {{ $errors->first('is_cooki_alert') }} </p>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-5 control-label">{{ __('WhatsApp Button') }}<span
                                                class="text-danger">*</span></label>
                                    <div class="col-sm-7">
                                        <input type="checkbox" {{ $visibility->is_whatsapp == '1' ? 'checked' : '' }} data-size="large" name="is_whatsapp" data-bootstrap-switch data-off-color="danger" data-on-color="primary" data-on-text="Visible" data-label-text="<i class='fas fa-mouse'></i>"  data-off-text="Invisible">
                                        @if ($errors->has('is_whatsapp'))
                                            <p class="text-danger"> {{ $errors->first('is_whatsapp') }} </p>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-5 control-label">{{ __('Phone Call Button') }}<span
                                                class="text-danger">*</span></label>
                                    <div class="col-sm-7">
                                        <input type="checkbox" {{ $visibility->is_call_button == '1' ? 'checked' : '' }} data-size="large" name="is_call_button" data-bootstrap-switch data-off-color="danger" data-on-color="primary" data-on-text="Visible" data-label-text="<i class='fas fa-mouse'></i>"  data-off-text="Invisible">
                                        @if ($errors->has('is_call_button'))
                                            <p class="text-danger"> {{ $errors->first('is_call_button') }} </p>
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
