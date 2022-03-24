@extends('layouts.dashboard')

@section('content')

<div class="content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">{{ __('Announcement Popup') }}</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="fas fa-home"></i>{{ __('Home') }}</a></li>
                    <li class="breadcrumb-item">{{ __('Announcement Popup') }}</li>
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
                        <h3 class="card-title">{{ __('Update Announcement Popup') }} </h3>
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
                        <form class="form-horizontal" action="{{ route('admin.update_announcement', $st->language_id ) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <label class="col-sm-2 control-label">{{ __('Announcement Popup') }}<span
                                            class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <input type="checkbox" {{ $commonsetting->is_announcement == '1' ? 'checked' : '' }} data-size="large" name="is_announcement" data-bootstrap-switch data-off-color="danger" data-on-color="primary" data-on-text="Active" data-label-text="<i class='fas fa-mouse'></i>"  data-off-text="Dactive">
                                    @if ($errors->has('is_announcement'))
                                        <p class="text-danger"> {{ $errors->first('is_announcement') }} </p>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 control-label">{{ __('Announcement Image') }} <span class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <img class="mw-400 mb-3 show-img img-demo" src="
                                    @if($st->announcement)
                                    {{ asset('assets/front/img/'.$st->announcement)}}
                                    @else
                                    {{ asset('assets/admin/img/img-demo.jpg') }}
                                    @endif"
                                    " alt="">
                                    <div class="custom-file">
                                        <label class="custom-file-label" for="announcement">{{ __('Choose New Image') }}</label>
                                        <input type="file" class="custom-file-input up-img" name="announcement" id="announcement">
                                    </div>
                                    <p class="help-block text-info">{{ __('Upload 960X519 (Pixel) Size image for best quality.
                                        Only jpg, jpeg, png image is allowed.') }}
                                    </p>
                                    @if ($errors->has('announcement'))
                                        <p class="text-danger"> {{ $errors->first('announcement') }} </p>
                                    @endif
                                </div>

                            </div>
                            <div class="form-group row">
                                <label for="website_title" class="col-sm-2 control-label">{{ __('Popup Delay (Second)') }} <span
                                        class="text-danger">*</span></label>

                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="announcement_delay" value="{{ $st->announcement_delay }}">
                                    @if ($errors->has('announcement_delay'))
                                    <p class="text-danger"> {{ $errors->first('announcement_delay') }} </p>
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
