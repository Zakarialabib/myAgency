
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
                            <h3 class="card-title mt-1">{{ $page_title }}</h3>
                            <div class="card-tools">
                                <a href="{{ route('admin.language.index') }}" class="btn bg-pink-500 text-white active:bg-pink-600 focus:ring-pink-500 btn-sm">
                                    <i class="fas fa-angle-double-left"></i> {{ __('Back') }}
                                </a>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive" id="app">
                            <form method="post" action="{{route('admin.language.updateKeyword', $la->id)}}" id="langForm">
                                {{ csrf_field() }}
              
                                <div class="row"> 
                                    <div class="col-md-4 mt-2" v-for="(value, key) in datas" :key="key">
                                        <div class="form-group">
                                            <label for="title" class="control-label"  style="white-space: normal;">@{{ key }}</label>
                                            <input type="text" class="form-control" :value="value" :name="'keys[' + key + ']'">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-12 mt-3">
                                        <button type="submit" class="btn bg-pink-500 text-white active:bg-pink-600 focus:ring-pink-500 btn-block">{{ __('Update') }}</button>
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


@section('script')
    <script src="{{asset('assets/admin/plugins/vue/vue.js')}}"></script>
    <script src="{{asset('assets/admin/plugins/vue/axios.js')}}"></script>
    <script>
        window.Laravel = {!! json_encode([
        'csrfToken' => csrf_token(),
    ]) !!};
    </script>

    <script>
        window.app = new Vue({
            el: '#app',
            data: {
                datas: {!! $json !!},
            }
        })
    </script>

@endsection
