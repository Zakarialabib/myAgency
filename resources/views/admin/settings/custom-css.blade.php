@extends('layouts.dashboard')

@section('style')
    <link rel="stylesheet" href="{{asset('assets/admin/plugins/codemirror/codemirror.css')}}">
@endsection

@section('content')

<div class="content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">{{ __('Custom CSS') }}</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="fas fa-home"></i>{{ __('Home') }}</a></li>
                    <li class="breadcrumb-item">{{ __('Custom CSS') }}</li>
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
                        <h3 class="card-title">{{ __('Write your custom CSS hear.') }} </h3>
                    </div>
                    <div class="card-body">
                        <form action="{{route('admin.custom.css.update')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <textarea name="custom_css_area" id="custom_css_area" cols="30" rows="10">{{$custom_css}}</textarea>
                            </div>
                            <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">{{__('Update Changes')}}</button>
                        </form>
                    </div>
                </div>
            </div>
            <!-- /.col -->
        </div>
    </div>
</section>

@endsection


@section('script')
    <script src="{{asset('assets/admin/plugins/codemirror/codemirror.js')}}"></script>
    <script>
        (function($) {
            "use strict";
            var editor = CodeMirror.fromTextArea(document.getElementById("custom_css_area"), {
                lineNumbers: true,
                mode: "text/css",
                matchBrackets: true,
                theme: "monokai"
            });
        })(jQuery);
    </script>
@endsection
