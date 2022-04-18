@extends('layouts.dashboard')

@section('content')

<div class="content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">{{ __('Basic Information') }}</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="fas fa-home"></i>{{ __('Home') }}</a></li>
                    <li class="breadcrumb-item">{{ __('Basic Information') }}</li>
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
                        <h3 class="card-title">{{ __('Update Basic Information') }} </h3>
                        <div class="card-tools d-flex">
                            <div class="d-inline-block mr-4">
                                <select class="form-control lang languageSelect"  data="{{url()->current() . '?language='}}">
                                    @foreach($langs as $lang)
                                        <option value="{{$lang->code}}" {{$lang->code == request()->input('language') ? 'selected' : ''}} >{{$lang->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="card-body">
                        <form class="form-horizontal" action="{{ route('admin.setting.updateBasicinfo', $basicinfo->language_id ) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            
                            <div class="form-group row">
                                <label for="website_title" class="col-sm-2 control-label">{{ __('Site Title') }} <span
                                        class="text-danger">*</span></label>

                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="website_title" value="{{ $basicinfo->website_title }}" placeholder="{{ __('Site Title') }}">
                                    @if ($errors->has('website_title'))
                                    <p class="text-danger"> {{ $errors->first('website_title') }} </p>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="base_color" class="col-sm-2 control-label">{{ __('Theme Color') }}</label>
                                <div class="col-sm-10">
                                    <div class="input-group my-colorpicker2">
                                        <input type="text" class="form-control" value="{{ $basicinfo->base_color }}"  placeholder="#000000" name="base_color">
                                        <div class="input-group-append">
                                          <span class="input-group-text" style="color: #{{ $basicinfo->base_color }}"><i class="fas fa-square"></i></span>
                                        </div>
                                      </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="base_color" class="col-sm-2 control-label">{{ __('Gradint Color') }}</label>
                                <div class="col-sm-10">
                                    <label class="d-block control-label">{{ __("Color 1") }}</label>
                                    <div class="input-group my-colorpicker2">
                                        <input type="text" class="form-control" value="{{ $basicinfo->gcolor1 }}"  placeholder="#000000" name="gcolor1">
                                        <div class="input-group-append">
                                          <span class="input-group-text" style="color: #{{ $basicinfo->gcolor1 }}"><i class="fas fa-square"></i></span>
                                        </div>
                                    </div>
                                    <br>
                                    <label class="d-block control-label">{{ __("Color 2") }}</label>
                                    <div class="input-group my-colorpicker2">
                                        <input type="text" class="form-control" value="{{ $basicinfo->gcolor2 }}"  placeholder="#000000" name="gcolor2">
                                        <div class="input-group-append">
                                          <span class="input-group-text" style="color: #{{ $basicinfo->gcolor2 }}"><i class="fas fa-square"></i></span>
                                        </div>
                                    </div>
                                    <br>
                                    <label class="d-block control-label">{{ __("Color 3") }}</label>
                                    <div class="input-group my-colorpicker2">
                                        <input type="text" class="form-control" value="{{ $basicinfo->gcolor3 }}"  placeholder="#000000" name="gcolor3">
                                        <div class="input-group-append">
                                          <span class="input-group-text" style="color: #{{ $basicinfo->gcolor3 }}"><i class="fas fa-square"></i></span>
                                        </div>
                                    </div>
                                    <br>
                                    <p >Output Grading Color :</p>
                                    <div style="
                                    padding : 30px;
                                    width: 100%;
                                    background-image: linear-gradient(to right, #{{ $basicinfo->gcolor1 }}, #{{ $basicinfo->gcolor2 }}, #{{ $basicinfo->gcolor3 }});
                                    ">

                                    </div>
                                    <br>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 control-label">{{ __('Dark Mode') }}<span
                                            class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <input type="checkbox" {{ $basicinfo->is_dark == '1' ? 'checked' : '' }} data-size="large" name="is_dark" data-bootstrap-switch data-off-color="danger" data-on-color="primary" data-on-text="Active" data-label-text="<i class='fas fa-mouse'></i>"  data-off-text="Dactive">
                                    @if ($errors->has('is_dark'))
                                        <p class="text-danger"> {{ $errors->first('is_dark') }} </p>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="website_title" class="col-sm-2 control-label">{{ __('Currency Direction') }} <span
                                        class="text-danger">*</span></label>

                                <div class="col-sm-10">
                                    <select name="currency_direction" class="form-control" id="">
                                        <option value="0" {{  $basicinfo->currency_direction == 0 ? 'selected' : ''  }}>{{ __('Left') }}</option>
                                        <option value="1" {{  $basicinfo->currency_direction == 1 ? 'selected' : ''  }}>{{ __('Right') }}</option>
                                    </select>
                                    @if ($errors->has('currency_direction'))
                                    <p class="text-danger"> {{ $errors->first('currency_direction') }} </p>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 control-label">{{ __('Favicon') }} <span class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <img class="mb-3 show-img img-demo" src="
                                    @if($basicinfo->fav_icon)
                                    {{ asset('assets/front/img/'.$basicinfo->fav_icon) }}
                                    @else
                                    {{ asset('assets/admin/img/img-demo.jpg') }}
                                    @endif"
                                    " alt="">
                                    <div class="custom-file">
                                        <label class="custom-file-label" for="fav_icon">{{ __('Choose New Image') }}</label>
                                        <input type="file" class="custom-file-input up-img" name="fav_icon" id="fav_icon">
                                    </div>
                                    <p class="help-block text-info">{{ __('Upload 40X40 (Pixel) Size image or Squre size image for best quality. Only jpg, jpeg, png image is allowed.') }}
                                    </p>
                                    @if ($errors->has('fav_icon'))
                                        <p class="text-danger"> {{ $errors->first('fav_icon') }} </p>
                                    @endif
                                </div>

                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 control-label">{{ __('Site Header Logo') }} <span class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <img class="mb-3 show-img img-demo" src="
                                    @if($basicinfo->header_logo)
                                    {{ asset('assets/front/img/'.$basicinfo->header_logo) }}
                                    @else
                                    {{ asset('assets/admin/img/img-demo.jpg') }}
                                    @endif" alt="">
                                    <div class="custom-file">
                                        <label class="custom-file-label" for="header_logo">Choose New Image</label>
                                        <input type="file" class="custom-file-input up-img" name="header_logo" id="header_logo">
                                    </div>
                                    <p class="help-block text-info">{{ __('Upload 150X40 (Pixel) Size image for best quality. Only jpg, jpeg, png image is allowed.') }}
                                    </p>
                                    @if ($errors->has('header_logo'))
                                        <p class="text-danger"> {{ $errors->first('header_logo') }} </p>
                                    @endif
                                </div>

                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 control-label">{{ __('Breadcrumb Image') }} <span class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <img class="mw-400 mb-3 show-img img-demo" src="
                                    @if($basicinfo->breadcrumb_image)
                                    {{ asset('assets/front/img/'.$basicinfo->breadcrumb_image)}}
                                    @else
                                    {{ asset('assets/admin/img/img-demo.jpg') }}
                                    @endif"
                                    " alt="">
                                    <div class="custom-file">
                                        <label class="custom-file-label" for="breadcrumb_image">{{ __('Choose New Image') }}</label>
                                        <input type="file" class="custom-file-input up-img" name="breadcrumb_image" id="breadcrumb_image">
                                    </div>
                                    <p class="help-block text-info">{{ __('Upload 1920X390 (Pixel) Size image for best quality. Only jpg, jpeg, png image is allowed.') }}
                                    </p>
                                    @if ($errors->has('breadcrumb_image'))
                                        <p class="text-danger"> {{ $errors->first('breadcrumb_image') }} </p>
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
