@extends('layouts.dashboard')


@section('content')

<div class="content-header">
        <div class="container-fluid">
            <div class="row">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">{{ __('Sitemap') }} </h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="fas fa-home"></i>{{ __('Home') }}</a></li>
                <li class="breadcrumb-item">{{ __('Sitemap') }}</li>
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
                                <h3 class="card-title mt-1">{{ __('Sitemap') }}</h3>
                                <div class="card-tools">
                                    <a href="{{ route('admin.sitemap.add') }}" class="btn btn-primary btn-sm">
                                        <i class="fas fa-plus"></i> {{ __('Add Sitemap') }}
                                    </a>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                @if (count($sitemaps) == 0)
                                    <h3 class="text-center">NO SITEMAP FOUND</h3>
                                @else
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-striped data_table">
                                        <thead>
                                            <tr>
                                            <th scope="col">File Name</th>
                                            <th scope="col">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($sitemaps as $key => $sitemap)
                                            <tr>
                                                <td>{{$sitemap->filename}}</td>
                                                <td>
                                                <form class="d-inline-block" action="{{route('admin.sitemap.download', $sitemap->id)}}" method="post">
                                                        @csrf
                                                        <input type="hidden" name="filename" value="{{$sitemap->filename}}">
                                                        <button type="submit" class="btn btn-info btn-sm">
                                                          <span class="btn-label">
                                                            <i class="fas fa-arrow-alt-circle-down"></i>
                                                          </span>
                                                          Download
                                                        </button>
                                                </form>
                                                <form  id="deleteform" class="d-inline-block" action="{{ route('admin.sitemap.delete', $sitemap->id ) }}" method="post">
                                                        @csrf
                                                        <input type="hidden" name="id" value="{{ $sitemap->id }}">
                                                        <button type="submit" class="btn btn-danger btn-sm" id="delete">
                                                        <i class="fas fa-trash"></i>{{ __('Delete') }}
                                                        </button>
                                                </form>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                        </table>
                                    </div>
                                @endif
                              
                                
                            </div>
                            <!-- /.card-body -->
                        </div>
            </div>
        </div>
    </div>
    <!-- /.row -->

</section>
@endsection
