@extends('layouts.dashboard')

@section('content')

<div class="content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">{{ __('Preloader') }}</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="fas fa-home"></i>{{ __('Home') }}</a></li>
                    <li class="breadcrumb-item">{{ __('Preloader') }}</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h3 class="card-title">{{ __('Update Preloader') }} </h3>
                        
                    </div>
                    <!-- /.box-header -->
                    <div class="card-body">
                        <form class="form-horizontal" action="{{ route('admin.update_preloader' ) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <label class="col-sm-2 control-label">{{ __('Preloader') }}<span
                                            class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <input type="checkbox" {{ $visibility->is_preloader == '1' ? 'checked' : '' }} data-size="large" name="is_preloader" data-bootstrap-switch data-off-color="danger" data-on-color="primary" data-on-text="Active" data-label-text="<i class='fas fa-mouse'></i>"  data-off-text="Dactive">
                                    @if ($errors->has('is_preloader'))
                                        <p class="text-danger"> {{ $errors->first('is_preloader') }} </p>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 control-label">{{ __('Preloader Icon') }} <span class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <img class="mw-400 mb-3 show-img img-demo" src="
                                    @if($commonsetting->preloader_icon)
                                    {{ asset('assets/front/img/'.$commonsetting->preloader_icon)}}
                                    @else
                                    {{ asset('assets/admin/img/img-demo.jpg') }}
                                    @endif"
                                    " alt="">
                                    <div class="custom-file">
                                        <label class="custom-file-label" for="preloader_icon">{{ __('Choose New Image') }}</label>
                                        <input type="file" class="custom-file-input up-img" name="preloader_icon" id="preloader_icon">
                                    </div>
                                   
                                    @if ($errors->has('preloader_icon'))
                                        <p class="text-danger"> {{ $errors->first('preloader_icon') }} </p>
                                    @endif
                                </div>

                            </div>
                            <div class="form-group row">
                                <label for="base_color" class="col-sm-2 control-label">{{ __('Background Color') }}</label>
                                <div class="col-sm-10">
                                    <div class="input-group my-colorpicker2">
                                        <input type="text" class="form-control" value="{{ $commonsetting->preloader_bg_color }}"  placeholder="#ffffff" name="preloader_bg_color">
                                        <div class="input-group-append">
                                          <span class="input-group-text"><i class="fas fa-square"></i></span>
                                        </div>
                                      </div>
                                      @if ($errors->has('preloader_bg_color'))
                                      <p class="text-danger"> {{ $errors->first('preloader_bg_color') }} </p>
                                  @endif
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <div class="offset-sm-2 col-sm-10">
                                    <button type="submit" class="btn btn-primary">{{ __('Update') }}</button>
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
