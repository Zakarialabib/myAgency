@extends('layouts.dashboard')

@section('content')

<div class="content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">{{ __('Cookie Alert') }}</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="fas fa-home"></i>{{ __('Home') }}</a></li>
                    <li class="breadcrumb-item">{{ __('Cookie Alert') }}</li>
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
                        <h3 class="card-title">{{ __('Update Cookie Text') }} </h3>
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
                        <form class="form-horizontal" action="{{ route('admin.cookie.update', $cookie->language_id) }}" method="POST">
                            @csrf
                       
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <textarea class="form-control summernote" name="cookie_alert_text" placeholder="{{ __('Cookie Alert Text') }}"  rows="4">{{ $cookie->cookie_alert_text }}</textarea>
                                    @if ($errors->has('cookie_alert_text'))
                                        <p class="text-danger"> {{ $errors->first('cookie_alert_text') }} </p>
                                    @endif
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <div class="col-sm-12">
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
