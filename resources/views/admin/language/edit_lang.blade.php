
@extends('layouts.dashboard')

@section('content')

    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">{{ __('Languages') }}</h1>
                @stack('breadcrumb-plugins')
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
                            <h3 class="card-title mt-1">Language Keywords of {{ $la->name }}</h3>
                            <div class="card-tools">
                                <a href="{{ route('admin.language-manage') }}" class="font-bold border-transparent uppercase justify-center text-xs py-1 px-2 rounded shadow hover:shadow-md outline-none focus:outline-none focus:ring-2 focus:ring-offset-2 mr-1 ease-linear transition-all duration-150 cursor-pointer bg-pink-500 text-white active:bg-pink-600 focus:ring-pink-500 importBtn">@lang('All Languages')</a>
                                <button type="button" class="font-bold border-transparent uppercase justify-center text-xs py-1 px-2 rounded shadow hover:shadow-md outline-none focus:outline-none focus:ring-2 focus:ring-offset-2 mr-1 ease-linear transition-all duration-150 cursor-pointer btn-success  importBtn"><i class="la la-download"></i>@lang('Import Language')</button>
                                <button type="button" data-toggle="modal" data-target="#addModal" class="font-bold border-transparent uppercase justify-center text-xs py-1 px-2 rounded shadow hover:shadow-md outline-none focus:outline-none focus:ring-2 focus:ring-offset-2 mr-1 ease-linear transition-all duration-150 cursor-pointer bg-pink-500 text-white active:bg-pink-600 focus:ring-pink-500 "><i class="fa fa-plus"></i> @lang('Add New Key') </button>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table class="table table-bordered table-striped data_table" id="myTable">
                                <thead>
                                <tr>
                                    <th scope="col">@lang('Key')
                                    </th>
                                    <th scope="col" class="text-left">
                                        {{$la->name}}
                                    </th>

                                    <th scope="col" class="w-85">@lang('Action')</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($json as $k => $lang)
                                    <tr>
                                        <td data-label="@lang('key')">{{$k}}</td>
                                        <td data-label="@lang('Value')" class="text-left ">{{$lang}}</td>


                                        <td data-label="@lang('Action')">
                                            <a href="javascript:void(0)"
                                               data-target="#editModal"
                                               data-toggle="modal"
                                               data-title="{{$k}}"
                                               data-key="{{$k}}"
                                               data-value="{{$lang}}"
                                               class="editModal icon-btn ml-1 btn bg-pink-500 text-white active:bg-pink-600 focus:ring-pink-500  btn-sm"
                                               >
                                                <i class="fas fa-edit"></i>Edit
                                            </a>

                                            <a href="javascript:void(0)"
                                               data-key="{{$k}}"
                                               data-value="{{$lang}}"
                                               data-toggle="modal" data-target="#DelModal"
                                               class="icon-btn btn--danger ml-1 deleteKey btn btn-danger btn-sm"
                                               >
                                                <i class="fas fa-trash"></i>Delete
                                            </a>

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


    <div class="modal fade" id="addModal" role="dialog">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel"> @lang('Add New')</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">×</span></button>
                </div>

                <form action="{{route('admin.store-lang-key',$la->id)}}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group row">
                            <div class="col-lg-4">
                                <label for="key" class="control-label font-weight-bold">@lang('Key')</label>
                            </div>
                            <div class="col-lg-8">
                                <input type="text" class="form-control form-control-lg " id="key" name="key" value="{{old('key')}}">
                            </div>

                        </div>
                        <div class="form-group row">
                            <div class="col-lg-4">
                                <label for="value" class="control-label font-weight-bold">@lang('Value')</label>
                            </div>
                            <div class="col-lg-8">
                                <input type="text" class="form-control form-control-lg " id="value" name="value" value="{{old('value')}}">
                            </div>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-dark" data-dismiss="modal">@lang('Close')</button>
                        <button type="submit" class="btn bg-pink-500 text-white active:bg-pink-600 focus:ring-pink-500"> @lang('Save')</button>
                    </div>
                </form>

            </div>
        </div>
    </div>


    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">@lang('Edit')</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">×</span></button>
                </div>

                <form action="{{route('admin.update-lang-key',$la->id)}}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group ">
                            <label for="inputName" class="control-label font-weight-bold form-title"></label>

                            <input type="text" class="form-control form-control-lg" name="value"
                                       placeholder="@lang('Value')" value="">

                        </div>
                        <input type="hidden" name="key">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-dark" data-dismiss="modal">@lang('Close')</button>
                        <button type="submit" class="btn bg-pink-500 text-white active:bg-pink-600 focus:ring-pink-500">@lang('Update')</button>
                    </div>
                </form>

            </div>
        </div>
    </div>


    <!-- Modal for DELETE -->
    <div class="modal fade" id="DelModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">@lang('Delete Keyword')</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>

                <div class="modal-body">
                    @lang('Are you sure to delete this keyword?')
                </div>
                <form action="{{route('admin.delete-lang-key',$la->id)}}" method="post">
                    @csrf
                    <input type="hidden" name="key">
                    <input type="hidden" name="value">
                    <div class="modal-footer">
                        <button type="button" class="btn btn-dark" data-dismiss="modal">@lang('No')</button>
                        <button type="submit" class="btn btn-danger ">@lang('Yes')</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


     {{-- Import Modal --}}
     <div class="modal fade" id="importModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">@lang('Import Language')</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">×</span></button>
                    </div>
                    <div class="modal-body">
                        <p class="text-center text--danger">@lang('If you import keywords, Your current keywords will be removed and replaced by imported keyword')</p>
                        <div class="form-group">
                        <label for="key" class="control-label font-weight-bold">@lang('Key')</label>
                        <select class="form-control select_lang"  required>
                            <option value="">@lang('Import Keywords')</option>
                            @foreach($list_lang as $data)
                            <option value="{{$data->id}}" @if($data->id == $la->id) class="d-none" @endif >{{ __($data->name) }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-dark" data-dismiss="modal">@lang('Close')</button>
                    <button type="button" class="btn bg-pink-500 text-white active:bg-pink-600 focus:ring-pink-500 import_lang"> @lang('Import Now')</button>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('script')
    <script>
        (function($){
            "use strict";
            $('.deleteKey').on('click', function () {
                var modal = $('#DelModal');
                modal.find('input[name=key]').val($(this).data('key'));
                modal.find('input[name=value]').val($(this).data('value'));
            });
            $('.editModal').on('click', function () {
                var modal = $('#editModal');
                modal.find('.form-title').text($(this).data('title'));
                modal.find('input[name=key]').val($(this).data('key'));
                modal.find('input[name=value]').val($(this).data('value'));
            });


            $('.importBtn').on('click', function () {
                $('#importModal').modal('show');
            });
            $(document).on('click','.import_lang',function(){
                var id = $('.select_lang').val();

                if(id ==''){
                    iziToast.error({
                        message: "@lang('Please Select a language to Import')",
                        position: "topRight"
                    });

                    return 0;
                }else{
                    $.ajax({
                        type:"post",
                        url:"{{route('admin.language.import_lang')}}",
                        data:{
                            id : id,
                            myLangid : "{{$la->id}}",
                            _token: "{{csrf_token()}}"
                        },
                        success:function(data){

                            if (data == 'success'){
                                iziToast.success({
                                    message: "@lang('Import Data Successfully')",
                                    position: "topRight"
                                });

                                window.location.href = "{{url()->current()}}"
                            }
                        }
                        ,
                        error:function(res){

                        }
                    });
                }
            });
        })(jQuery);


    </script>
@endpush


{{-- @push('style')
    <style>
        table.dataTable tbody tr td{
            white-space: normal;
        }
    </style>
@endpush --}}
