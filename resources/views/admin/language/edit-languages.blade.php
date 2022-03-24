
@extends('layouts.dashboard')

@section('content')

    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">{{ __('Languages') }}</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="fas fa-home"></i>{{ __('Home') }}</a></li>
                <li class="breadcrumb-item">{{ __('Languages') }}</li>
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
                            <h3 class="card-title mt-1">{{ __('Edit Language') }}</h3>
                            <div class="card-tools">
                                <a href="{{ route('admin.language.index') }}" class="btn btn-primary btn-sm">
                                    <i class="fas fa-angle-double-left"></i> {{ __('Back') }}
                                </a>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive">
                            <form  action="{{route('admin.language.update', $language->id)}}" method="POST">
                                @csrf

                                <div class="form-group row">
                                    <label for="title" class="col-sm-2 control-label">{{ __('Name') }}<span class="text-danger">*</span></label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="name" placeholder="{{ __('Enter Name') }}" value="{{  $language->name }}">
                                        @if ($errors->has('name'))
                                            <p class="text-danger"> {{ $errors->first('name') }} </p>
                                        @endif
                                    </div>
                                </div>
                         
                                <div class="form-group row">
                                    <label for="bcategory_id" class="col-sm-2 control-label">{{ __('Direction') }}<span class="text-danger">*</span></label>
    
                                    <div class="col-sm-10">
                                        <select class="form-control" name="direction">
                                            <option value="ltr" {{ $language->direction == 'ltr' ? 'selected' : '' }}>LTR</option>
                                            <option value="rtl" {{ $language->direction == 'rtl' ? 'selected' : '' }}>RTL</option>
                                        </select>
                                        @if ($errors->has('direction'))
                                            <p class="text-danger"> {{ $errors->first('direction') }} </p>
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
