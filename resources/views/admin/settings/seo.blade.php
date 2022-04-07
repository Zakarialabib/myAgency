@extends('layouts.dashboard')

@section('content')

<div class="content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">{{ __('SEO Information') }}</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="fas fa-home"></i>{{ __('Home') }}</a></li>
                    <li class="breadcrumb-item">{{ __('SEO Information') }}</li>
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
                        <h3 class="card-title">{{ __('Update SEO Information') }} </h3>
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
                        <form class="form-horizontal" action="{{ route('admin.setting.updateSeoinfo', $seo->language_id) }}" method="POST">
                            @csrf
                            <div class="form-group row">
                                <label  class="col-sm-12 control-label">{{ __('Home Page - Meta Keywords') }} </label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" data-role="tagsinput" name="meta_keywords" placeholder="{{ __('Enter Meta Keywords') }}" value="{{ $seo->meta_keywords }}">
                                    @if ($errors->has('meta_keywords'))
                                        <p class="text-danger"> {{ $errors->first('meta_keywords') }} </p>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label  class="col-sm-12 control-label">{{ __('Home Page - Meta Description') }}</label>
                                <div class="col-sm-12">
                                    <textarea class="form-control" name="meta_description" placeholder="{{ __('Meta Description') }}"  rows="4">{{ $seo->meta_description }}</textarea>
                                    @if ($errors->has('meta_description'))
                                        <p class="text-danger"> {{ $errors->first('meta_description') }} </p>
                                    @endif
                                </div>
                            </div>

                            <br>
                            <div class="form-group row">
                                <label  class="col-sm-12 control-label">{{ __('About Page - Meta Keywords') }} </label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" data-role="tagsinput" name="about_meta_key" placeholder="{{ __('Enter Meta Keywords') }}" value="{{ $seo->about_meta_key }}">
                                    @if ($errors->has('about_meta_key'))
                                        <p class="text-danger"> {{ $errors->first('about_meta_key') }} </p>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label  class="col-sm-12 control-label">{{ __('About Page - Meta Description') }}</label>
                                <div class="col-sm-12">
                                    <textarea class="form-control" name="about_meta_desc" placeholder="{{ __('Meta Description') }}"  rows="4">{{ $seo->about_meta_desc }}</textarea>
                                    @if ($errors->has('about_meta_desc'))
                                        <p class="text-danger"> {{ $errors->first('about_meta_desc') }} </p>
                                    @endif
                                </div>
                            </div>

                            <br>

                            
                            <div class="form-group row">
                                <label  class="col-sm-12 control-label">{{ __('Service Page - Meta Keywords') }} </label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" data-role="tagsinput" name="service_meta_key" placeholder="{{ __('Enter Meta Keywords') }}" value="{{ $seo->service_meta_key }}">
                                    @if ($errors->has('service_meta_key'))
                                        <p class="text-danger"> {{ $errors->first('service_meta_key') }} </p>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label  class="col-sm-12 control-label">{{ __('Service Page - Meta Description') }}</label>
                                <div class="col-sm-12">
                                    <textarea class="form-control" name="service_meta_desc" placeholder="{{ __('Meta Description') }}"  rows="4">{{ $seo->service_meta_desc }}</textarea>
                                    @if ($errors->has('service_meta_desc'))
                                        <p class="text-danger"> {{ $errors->first('service_meta_desc') }} </p>
                                    @endif
                                </div>
                            </div>

                            <br>
                            
                            <div class="form-group row">
                                <label  class="col-sm-12 control-label">{{ __('Portfolio Page - Meta Keywords') }} </label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" data-role="tagsinput" name="portfolio_meta_key" placeholder="{{ __('Enter Meta Keywords') }}" value="{{ $seo->portfolio_meta_key }}">
                                    @if ($errors->has('portfolio_meta_key'))
                                        <p class="text-danger"> {{ $errors->first('portfolio_meta_key') }} </p>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label  class="col-sm-12 control-label">{{ __('Portfolio Page - Meta Description') }}</label>
                                <div class="col-sm-12">
                                    <textarea class="form-control" name="portfolio_meta_desc" placeholder="{{ __('Meta Description') }}"  rows="4">{{ $seo->portfolio_meta_desc }}</textarea>
                                    @if ($errors->has('portfolio_meta_desc'))
                                        <p class="text-danger"> {{ $errors->first('portfolio_meta_desc') }} </p>
                                    @endif
                                </div>
                            </div>

                            <br>
                            
                            <div class="form-group row">
                                <label  class="col-sm-12 control-label">{{ __('Package Page - Meta Keywords') }} </label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" data-role="tagsinput" name="package_meta_key" placeholder="{{ __('Enter Meta Keywords') }}" value="{{ $seo->package_meta_key }}">
                                    @if ($errors->has('package_meta_key'))
                                        <p class="text-danger"> {{ $errors->first('package_meta_key') }} </p>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label  class="col-sm-12 control-label">{{ __('Package Page - Meta Description') }}</label>
                                <div class="col-sm-12">
                                    <textarea class="form-control" name="package_meta_desc" placeholder="{{ __('Meta Description') }}"  rows="4">{{ $seo->package_meta_desc }}</textarea>
                                    @if ($errors->has('package_meta_desc'))
                                        <p class="text-danger"> {{ $errors->first('package_meta_desc') }} </p>
                                    @endif
                                </div>
                            </div>

                            <br>
                            
                            <div class="form-group row">
                                <label  class="col-sm-12 control-label">{{ __('Team Page - Meta Keywords') }} </label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" data-role="tagsinput" name="team_meta_key" placeholder="{{ __('Enter Meta Keywords') }}" value="{{ $seo->team_meta_key }}">
                                    @if ($errors->has('team_meta_key'))
                                        <p class="text-danger"> {{ $errors->first('team_meta_key') }} </p>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label  class="col-sm-12 control-label">{{ __('Team Page - Meta Description') }}</label>
                                <div class="col-sm-12">
                                    <textarea class="form-control" name="team_meta_desc" placeholder="{{ __('Meta Description') }}"  rows="4">{{ $seo->team_meta_desc }}</textarea>
                                    @if ($errors->has('team_meta_desc'))
                                        <p class="text-danger"> {{ $errors->first('team_meta_desc') }} </p>
                                    @endif
                                </div>
                            </div>

                            <br>
                            
                            <div class="form-group row">
                                <label  class="col-sm-12 control-label">{{ __('FAQ Page - Meta Keywords') }} </label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" data-role="tagsinput" name="faq_meta_key" placeholder="{{ __('Enter Meta Keywords') }}" value="{{ $seo->faq_meta_key }}">
                                    @if ($errors->has('faq_meta_key'))
                                        <p class="text-danger"> {{ $errors->first('faq_meta_key') }} </p>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label  class="col-sm-12 control-label">{{ __('FAQ Page - Meta Description') }}</label>
                                <div class="col-sm-12">
                                    <textarea class="form-control" name="faq_meta_desc" placeholder="{{ __('Meta Description') }}"  rows="4">{{ $seo->faq_meta_desc }}</textarea>
                                    @if ($errors->has('faq_meta_desc'))
                                        <p class="text-danger"> {{ $errors->first('faq_meta_desc') }} </p>
                                    @endif
                                </div>
                            </div>

                            <br>
                            
                            <div class="form-group row">
                                <label  class="col-sm-12 control-label">{{ __('Gallery Page - Meta Keywords') }} </label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" data-role="tagsinput" name="gallery_meta_key" placeholder="{{ __('Enter Meta Keywords') }}" value="{{ $seo->gallery_meta_key }}">
                                    @if ($errors->has('gallery_meta_key'))
                                        <p class="text-danger"> {{ $errors->first('gallery_meta_key') }} </p>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label  class="col-sm-12 control-label">{{ __('Gallery Page - Meta Description') }}</label>
                                <div class="col-sm-12">
                                    <textarea class="form-control" name="gallery_meta_desc" placeholder="{{ __('Meta Description') }}"  rows="4">{{ $seo->gallery_meta_desc }}</textarea>
                                    @if ($errors->has('gallery_meta_desc'))
                                        <p class="text-danger"> {{ $errors->first('gallery_meta_desc') }} </p>
                                    @endif
                                </div>
                            </div>

                            <br>
                            
                            <div class="form-group row">
                                <label  class="col-sm-12 control-label">{{ __('Career Page - Meta Keywords') }} </label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" data-role="tagsinput" name="career_meta_key" placeholder="{{ __('Enter Meta Keywords') }}" value="{{ $seo->career_meta_key }}">
                                    @if ($errors->has('career_meta_key'))
                                        <p class="text-danger"> {{ $errors->first('career_meta_key') }} </p>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label  class="col-sm-12 control-label">{{ __('Career Page - Meta Description') }}</label>
                                <div class="col-sm-12">
                                    <textarea class="form-control" name="career_meta_desc" placeholder="{{ __('Meta Description') }}"  rows="4">{{ $seo->career_meta_desc }}</textarea>
                                    @if ($errors->has('career_meta_desc'))
                                        <p class="text-danger"> {{ $errors->first('career_meta_desc') }} </p>
                                    @endif
                                </div>
                            </div>

                            <br>
                            
                            <div class="form-group row">
                                <label  class="col-sm-12 control-label">{{ __('Blog Page - Meta Keywords') }} </label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" data-role="tagsinput" name="blog_meta_key" placeholder="{{ __('Enter Meta Keywords') }}" value="{{ $seo->blog_meta_key }}">
                                    @if ($errors->has('blog_meta_key'))
                                        <p class="text-danger"> {{ $errors->first('blog_meta_key') }} </p>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label  class="col-sm-12 control-label">{{ __('Blog Page - Meta Description') }}</label>
                                <div class="col-sm-12">
                                    <textarea class="form-control" name="blog_meta_desc" placeholder="{{ __('Meta Description') }}"  rows="4">{{ $seo->blog_meta_desc }}</textarea>
                                    @if ($errors->has('blog_meta_desc'))
                                        <p class="text-danger"> {{ $errors->first('blog_meta_desc') }} </p>
                                    @endif
                                </div>
                            </div>

                            <br>
                            <div class="form-group row">
                                <label  class="col-sm-12 control-label">{{ __('Product Page - Meta Keywords') }} </label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" data-role="tagsinput" name="product_meta_key" placeholder="{{ __('Enter Meta Keywords') }}" value="{{ $seo->product_meta_key }}">
                                    @if ($errors->has('product_meta_key'))
                                        <p class="text-danger"> {{ $errors->first('product_meta_key') }} </p>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label  class="col-sm-12 control-label">{{ __('Product Page - Meta Description') }}</label>
                                <div class="col-sm-12">
                                    <textarea class="form-control" name="product_meta_desc" placeholder="{{ __('Meta Description') }}"  rows="4">{{ $seo->product_meta_desc }}</textarea>
                                    @if ($errors->has('product_meta_desc'))
                                        <p class="text-danger"> {{ $errors->first('product_meta_desc') }} </p>
                                    @endif
                                </div>
                            </div>

                            <br>
                            <div class="form-group row">
                                <label  class="col-sm-12 control-label">{{ __('Contact Page - Meta Keywords') }} </label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" data-role="tagsinput" name="contact_meta_key" placeholder="{{ __('Enter Meta Keywords') }}" value="{{ $seo->contact_meta_key }}">
                                    @if ($errors->has('contact_meta_key'))
                                        <p class="text-danger"> {{ $errors->first('contact_meta_key') }} </p>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label  class="col-sm-12 control-label">{{ __('Contact Page - Meta Description') }}</label>
                                <div class="col-sm-12">
                                    <textarea class="form-control" name="contact_meta_desc" placeholder="{{ __('Meta Description') }}"  rows="4">{{ $seo->contact_meta_desc }}</textarea>
                                    @if ($errors->has('contact_meta_desc'))
                                        <p class="text-danger"> {{ $errors->first('contact_meta_desc') }} </p>
                                    @endif
                                </div>
                            </div>

                            <br>
                            
                            <div class="form-group row">
                                <label  class="col-sm-12 control-label">{{ __('Quot Page - Meta Keywords') }} </label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" data-role="tagsinput" name="quot_meta_key" placeholder="{{ __('Enter Meta Keywords') }}" value="{{ $seo->quot_meta_key }}">
                                    @if ($errors->has('quot_meta_key'))
                                        <p class="text-danger"> {{ $errors->first('quot_meta_key') }} </p>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label  class="col-sm-12 control-label">{{ __('Quot Page - Meta Description') }}</label>
                                <div class="col-sm-12">
                                    <textarea class="form-control" name="quot_meta_desc" placeholder="{{ __('Meta Description') }}"  rows="4">{{ $seo->quot_meta_desc }}</textarea>
                                    @if ($errors->has('quot_meta_desc'))
                                        <p class="text-danger"> {{ $errors->first('quot_meta_desc') }} </p>
                                    @endif
                                </div>
                            </div>

                            
                            <div class="form-group row">
                                <div class="col-sm-12">
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
