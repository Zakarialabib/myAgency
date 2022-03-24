@extends('layouts.dashboard')

@section('content')

<div class="content-header">
    <div class="container-fluid">
        <div class="row">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">{{ __('Blogs') }}</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i>{{ __('Home') }}</a></li>
            <li class="breadcrumb-item">{{ __('Blogs') }}</li>
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
                                <h3 class="card-title mt-1">{{ __('Edit Blog Category') }}</h3>
                                <div class="card-tools">
                                    <a href="{{ route('admin.blog'). '?language=' . $currentLang->code }}" class="btn btn-primary btn-sm">
                                        <i class="fas fa-angle-double-left"></i> {{ __('Back') }}
                                    </a>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <form class="form-horizontal" action="{{ route('admin.blog.update', $blog->id) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group row">
                                        <label class="col-sm-2 control-label">{{ __('Language') }}<span class="text-danger">*</span></label>
        
                                        <div class="col-sm-10">
                                            <select class="form-control lang" name="language_id" id="blog_lan">
                                                <option value="" selected disabled>Select a Language</option>
                                                @foreach($langs as $lang)
                                                    <option value="{{$lang->id}}" {{ $blog->language_id == $lang->id ? 'selected' : '' }} >{{$lang->name}}</option>
                                                @endforeach
                                            </select>
                                            @if ($errors->has('language_id'))
                                                <p class="text-danger"> {{ $errors->first('language_id') }} </p>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 control-label">{{ __('Image') }}<span class="text-danger">*</span></label>
        
                                        <div class="col-sm-10">
                                            <img class="mw-400 mb-3 show-img img-demo" src="{{ asset('assets/front/img/blog/'.$blog->image) }}" alt="">
                                            <div class="custom-file">
                                                <label class="custom-file-label" for="image">{{ __('Choose New Image') }}</label>
                                                <input type="file" class="custom-file-input up-img" name="image" id="image">
                                            </div>
                                            @if ($errors->has('image'))
                                                <p class="text-danger"> {{ $errors->first('image') }} </p>
                                            @endif
                                            <p class="help-block text-info">{{ __('Upload 730X455 (Pixel) Size image for best quality.
                                                Only jpg, jpeg, png image is allowed.') }}
                                            </p>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="title" class="col-sm-2 control-label">{{ __('Title') }}<span class="text-danger">*</span></label>
        
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="title" placeholder="{{ __('Title') }}" value="{{ $blog->title }}">
                                            @if ($errors->has('title'))
                                                <p class="text-danger"> {{ $errors->first('title') }} </p>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="bcategory_id" class="col-sm-2 control-label">{{ __('Category') }}<span class="text-danger">*</span></label>
        
                                        <div class="col-sm-10">
                                            <select class="form-control" name="bcategory_id" id="bcategory_id">
                                                @foreach ($bcategories as $bcategory)
                                                    <option value="{{ $bcategory->id }}" {{ $bcategory->id == $blog->bcategory_id ? 'selected' : '' }} >{{ $bcategory->name }}</option>
                                                @endforeach
                                            </select>
                                            @if ($errors->has('bcategory_id'))
                                                <p class="text-danger"> {{ $errors->first('bcategory_id') }} </p>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="title" class="col-sm-2 control-label">{{ __('Content') }}<span class="text-danger">*</span></label>
        
                                        <div class="col-sm-10">
                                                <textarea name="content" class="form-control  summernote" rows="6" placeholder="{{ __('Content') }}">{{ $blog->content }}</textarea>
                                            @if ($errors->has('content'))
                                                <p class="text-danger"> {{ $errors->first('content') }} </p>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="meta_keywords" class="col-sm-2 control-label">{{ __('Meta Keywords') }} </label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" data-role="tagsinput" name="meta_keywords" placeholder="{{ __('Meta Keywords') }}" value="{{ $blog->meta_keywords }}">
                                            @if ($errors->has('meta_keywords'))
                                                <p class="text-danger"> {{ $errors->first('meta_keywords') }} </p>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="meta_description" class="col-sm-2 control-label">{{ __('Meta Description') }}</label>
                                        <div class="col-sm-10">
                                            <textarea class="form-control" name="meta_description" placeholder="{{ __('Meta Description') }}"  rows="4">{{ $blog->meta_description }}</textarea>
                                            @if ($errors->has('meta_description'))
                                                <p class="text-danger"> {{ $errors->first('meta_description') }} </p>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="status" class="col-sm-2 control-label">Status<span class="text-danger">*</span></label>
        
                                        <div class="col-sm-10">
                                            <select class="form-control" name="status">
                                                    <option value="0" {{ $blog->status == '0' ? 'selected' : '' }}>{{ __('Unpublish') }}</option>
                                                    <option value="1" {{ $blog->status == '1' ? 'selected' : '' }}>{{ __('Publish') }}</option>
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
