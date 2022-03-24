@extends('layouts.dashboard')

@section('content')

<div class="content-header">
    <div class="container-fluid">
        <div class="row">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">{{ __('Arcive') }}</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="fas fa-home"></i>{{ __('Home') }}</a></li>
            <li class="breadcrumb-item">{{ __('Arcive') }}</li>
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
                                <h3 class="card-title mt-1">{{ __('Add Arcive') }} </h3>
                                <div class="card-tools">
                                <a href="{{ route('admin.archive') }}" class="btn btn-primary btn-sm">
                                    <i class="fas fa-angle-double-left"></i> {{ __('Back') }}
                                </a>
                                </div>
                            </div>
                            <!-- /.box-header -->
                            <div class="card-body">
                                    <form class="form-horizontal" action="{{ route('admin.archive.store') }}" method="POST">
                                        @csrf
                                     
                                            <div class="form-group row">
                                                <label class="col-sm-2 control-label">{{ __('Date') }} <span class="text-danger">*</span></label>
                
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control datepicker" name="date" value="" placeholder="{{ __('Date') }}">
                                                    @if ($errors->has('date'))
                                                        <p class="text-danger"> {{ $errors->first('date') }} </p>
                                                    @endif
                                                </div>
                                            </div>
                 
                                            <div class="form-group row">
                                                <div class="offset-sm-2 col-sm-10">
                                                    <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
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


