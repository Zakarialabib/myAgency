@extends('layouts.dashboard')

@section('content')

<div class="content-header">
        <div class="container-fluid">
            <div class="row">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">{{ __('Blog Category') }} </h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="fas fa-home"></i>{{ __('Home') }}</a></li>
                <li class="breadcrumb-item">{{ __('Blogs') }}</li>
                <li class="breadcrumb-item">{{ __('Category') }}</li>
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
                            <a href="{{ route('admin.bcategory'). '?language=' . $currentLang->code }}" class="btn btn-primary btn-sm">
                                <i class="fas fa-angle-double-left"></i> {{ __('Back') }}
                            </a>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <form class="form-horizontal" action="{{ route('admin.bcategory.update', $bcategory->id) }}" method="POST">
                            @csrf
                                <div class="form-group row">
                                <label class="col-sm-2 control-label">{{ __('Language') }}<span class="text-danger">*</span></label>

                                <div class="col-sm-10">
                                    <select class="form-control lang" name="language_id">
                                        @foreach($langs as $lang)
                                            <option value="{{$lang->id}}" {{ $bcategory->language_id == $lang->id ? 'selected' : '' }} >{{$lang->name}}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('language_id'))
                                        <p class="text-danger"> {{ $errors->first('language_id') }} </p>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="name" class="col-sm-2 control-label">{{ __('Name') }}<span class="text-danger">*</span></label>

                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="name" placeholder="{{ __('Name') }}" value="{{ $bcategory->name }}">
                                    @if ($errors->has('name'))
                                        <p class="text-danger"> {{ $errors->first('name') }} </p>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="name" class="col-sm-2 control-label">{{ __('Order') }}<span class="text-danger">*</span></label>

                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="serial_number" placeholder="{{ __('Order') }}" value="{{ $bcategory->serial_number }}">
                                    @if ($errors->has('serial_number'))
                                        <p class="text-danger"> {{ $errors->first('serial_number') }} </p>
                                    @endif
                                </div>
                            </div>
                        <div class="form-group row">
                            <label for="status" class="col-sm-2 control-label">{{ __('Status') }}<span class="text-danger">*</span></label>

                            <div class="col-sm-10">
                                <select class="form-control" name="status">
                                    <option value="0" {{ $bcategory->status == '0' ? 'selected' : '' }}>{{ __('Unpublish') }}</option>
                                    <option value="1" {{ $bcategory->status == '1' ? 'selected' : '' }}>{{ __('Publish') }}</option>
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
