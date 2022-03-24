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
                    <h3 class="card-title">{{ __('Arcive List:') }}</h3>
                    <div class="card-tools">
                        <a href="{{ route('admin.archive.add') }}" class="btn btn-primary btn-sm">
                            <i class="fas fa-plus"></i> {{ __('Add') }}
                        </a>
                      </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body  table-responsive">
                    <table  class="table table-bordered table-striped data_table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>{{ __('Date') }}</th>
                                <th>{{ __('Action') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            @foreach ($archives as $id=>$archive)
                            <tr>
                                <td>{{ ++$id }}</td>
                                @php
                                    $myArr = explode('/', $archive->date);
                                    $monthNum  = $myArr[0];
                                    $dateObj   = DateTime::createFromFormat('!m', $monthNum);
                                    $monthName = $dateObj->format('F');
                                @endphp
                                <td>
                                    {{$monthName}} {{$myArr[1]}}
                                </td>  
                                <td>
                                    <a href="{{ route('admin.archive.edit', $archive->id) }}" class="btn btn-info btn-sm"><i class="fas fa-pencil-alt"></i>{{ __('Edit') }}</a>
                                    <a href="{{ route('admin.archive.delete', $archive->id ) }}" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i>{{ __('Delete') }}</a>
                                </td>
                            </tr>
                            @endforeach
                            
                        </tbody>
                    </table>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
    </div>
    <!-- /.row -->

</section>
@endsection
