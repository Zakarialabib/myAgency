@extends('layouts.dashboard')

@section('content')

<div class="content-header">
    <div class="container-fluid">
        <div class="row">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">{{ __('Service') }} </h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="fas fa-home"></i>{{ __('Home') }}</a></li>
                <li class="breadcrumb-item">{{ __('Service') }}</li>
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
                                <h3 class="card-title mt-1">{{ __('Edit Service') }}</h3>
                                <div class="card-tools">
                                    <a href="{{ route('admin.service'). '?language=' . $currentLang->code }}" class="btn btn-primary btn-sm">
                                        <i class="fas fa-angle-double-left"></i> {{ __('Back') }}
                                    </a>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <form class="form-horizontal" action="{{ route('admin.service.update',  $service->id) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group row">
                                        <label class="col-sm-2 control-label">{{ __('Language') }}<span class="text-danger">*</span></label>
        
                                        <div class="col-sm-10">
                                            <select class="form-control lang" name="language_id">
                                                @foreach($langs as $lang)
                                                    <option value="{{$lang->id}}" {{ $service->language_id == $lang->id ? 'selected' : '' }} >{{$lang->name}}</option>
                                                @endforeach
                                            </select>
                                            @if ($errors->has('language_id'))
                                                <p class="text-danger"> {{ $errors->first('language_id') }} </p>
                                            @endif
                                        </div>
                                    </div>
                            
                                    <div class="form-group row">
                                        <label class="col-sm-2 control-label">{{ __('Feature Image') }}<span class="text-danger">*</span> </label>
    
                                        <div class="col-sm-10">
                                            <img class="mw-400 mb-3 show-img img-demo" src="{{ asset('assets/front/img/service/'.$service->image) }}" alt="">
                                            <div class="custom-file">
                                                <label class="custom-file-label" for="image">{{ __('Choose Image') }}</label>
                                                <input type="file" class="custom-file-input up-img" name="image" id="image">
                                            </div>
                                            <p class="help-block text-info">{{ __('Upload 670X418 (Pixel) Size image for best quality.
                                                Only jpg, jpeg, png image is allowed.') }}
                                            </p>
                                            @if ($errors->has('image'))
                                                <p class="text-danger"> {{ $errors->first('image') }} </p>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 control-label">{{ __('Icon') }}<span class="text-danger">*</span><span class="d-block"><small>{{ __('(Fontawesome icon class )') }}</small></span></label>
                        
                                        <div class="col-sm-10">
                                          <input type="text" name="icon" class="form-control" placeholder="{{ __('Icon') }}"
                                            value="{{ $service->icon }}">
                                          @if ($errors->has('icon'))
                                          <p class="text-danger"> {{ $errors->first('icon') }} </p>
                                          @endif
                                        </div>
                                      </div>
                                      <div class="form-group row">
                                        <label class="col-sm-2 control-label">{{ __('Title') }}<span class="text-danger">*</span></label>
                        
                                        <div class="col-sm-10">
                                          <input type="text" name="title" class="form-control" placeholder="{{ __('Title') }}"
                                            value="{{ $service->title }}">
                                          @if ($errors->has('title'))
                                          <p class="text-danger"> {{ $errors->first('title') }} </p>
                                          @endif
                                        </div>
                                      </div>
                                    <div class="form-group row">
                                        <label  class="col-sm-2 control-label">{{ __('Description') }}<span class="text-danger">*</span></label>
        
                                        <div class="col-sm-10">
                                            <textarea name="content" class="form-control summernote" placeholder="{{ __('Description') }}" rows="7">{{ $service->content }}</textarea>
                                            @if ($errors->has('content'))
                                                <p class="text-danger"> {{ $errors->first('content') }} </p>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="value" class="col-sm-2 control-label">{{ __('Order') }}<span class="text-danger">*</span></label>
                        
                                        <div class="col-sm-10">
                                            <input type="number" class="form-control" name="serial_number" placeholder="{{ __('Order') }}" value="{{ $service->serial_number }}">
                                            @if ($errors->has('serial_number'))
                                            <p class="text-danger"> {{ $errors->first('serial_number') }} </p>
                                        @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="status" class="col-sm-2 control-label">{{ __('Status') }}<span class="text-danger">*</span></label>
        
                                        <div class="col-sm-10">
                                            <select class="form-control" name="status">
                                               <option value="0" {{ $service->status == '0' ? 'selected' : '' }}>{{ __('Unpublish') }}</option>
                                               <option value="1" {{ $service->status == '1' ? 'selected' : '' }}>{{ __('Publish') }}</option>
                                              </select>
                                            @if ($errors->has('status'))
                                                <p class="text-danger"> {{ $errors->first('status') }} </p>
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
                            <!-- /.card-body -->
                        </div>
            </div>
        </div>
    </div>
    <!-- /.row -->

</section>
@endsection
