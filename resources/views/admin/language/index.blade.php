@extends('layouts.dashboard')

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h3 class="card-title mt-1">{{ __('Languages List') }}</h3>
                            <div class="card-tools">
                                <a class="btn bg-pink-500 text-white active:bg-pink-600 focus:ring-pink-500 btn-sm box--shadow1 text-white text--small" data-toggle="modal"
                                    data-target="#myModal"><i class="la la-plus"></i>@lang('Add New
                                    Language')</a>

                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table class="table table-bordered table-striped data_table">
                                <thead>
                                    <tr>
                                        <th>@lang('Name')</th>
                                        <th>@lang('Code')</th>
                                        <th>@lang('Direction')</th>
                                        <th>@lang('Default')</th>
                                        <th>@lang('Actions')</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($languages as $item)
                                        <tr>
                                            <td data-label="@lang('Name')">
                                                <div class="user">

                                                    <span class="name">{{ __($item->name) }}</span>
                                                </div>
                                            </td>
                                            <td data-label="@lang('Code')"><strong>{{ __($item->code) }}</strong></td>
                                            <td><strong class="text-uppercase">{{ __($item->direction) }}</strong></td>
                                            <td data-label="@lang('Status')">
                                                @if ($item->is_default == 1)
                                                    <span class=" badge  badge-success">@lang('Default')</span>
                                                @else
                                                    <span class="badge  badge-warning">@lang('Selectable')</span>
                                                @endif
                                            </td>
                                            <td data-label="@lang('Action')">
                                                {{-- <a href="{{route('admin.language-key', $item->id)}}" class="icon-btn btn--success btn btn-success btn-sm">
                                                    <i class="fas fa-code"></i>Translate
                                                </a> --}}

                                                <a href="javascript:void(0)"
                                                    class="icon-btn ml-1 editBtn btn bg-pink-500 text-white active:bg-pink-600 focus:ring-pink-500 btn-sm"
                                                    data-url="{{ route('admin.languages.edit', $item->id) }}"
                                                    data-lang="{{ json_encode($item->only('name', 'text_align', 'is_default', 'direction')) }}"
                                                    data-icon="">
                                                    <i class="fas fa-edit"></i>Edit
                                                </a>


                                                {{-- @if ($item->id != 1)
                                                <a href="javascript:void(0)" class="icon-btn btn--danger ml-1 deleteBtn btn btn-danger btn-sm"   data-url="{{ route('admin.language.', $item->id) }}" data-toggle="modal" data-target="#deleteModal">
                                                    <i class="fas fa-trash"></i>Delete
                                                </a>
                                            @endif --}}
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td class="text-muted text-center" colspan="100%">{{ __($empty_message) }}
                                            </td>
                                        </tr>
                                    @endforelse

                                </tbody>
                            </table><!-- table end -->
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->

    </section>

    {{-- NEW MODAL --}}
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">@lang('Add New Language')</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">×</span></button>
                </div>
                <form class="form-horizontal" method="post" action="{{ route('admin.languages.create') }}"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">



                        <div class="form-group row">
                            <div class="md:w-1/3 pr-4 pl-4">
                                <label class="font-weight-bold ">@lang('Name')</label>
                            </div>
                            <div class="md:w-2/3 pr-4 pl-4">
                                <input type="text" class="form-control has-error bold " id="code" name="name"
                                    placeholder="@lang('e.g. Japaneese, Portuguese')" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="md:w-1/3 pr-4 pl-4">
                                <label class="font-weight-bold">@lang('Code')</label>
                            </div>
                            <div class="md:w-2/3 pr-4 pl-4">
                                <input type="text" class="form-control has-error bold " id="link" name="code"
                                    placeholder="@lang('e.g. jp, pt-br')" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="status" class="sm:w-1/3 pr-4 pl-4 control-label">Direction<span
                                    class="text-danger">*</span></label>

                            <div class="sm:w-2/3 pr-4 pl-4">
                                <select class="form-control" name="direction">
                                    <option value="ltr">LTR</option>
                                    <option value="rtl">RTL</option>
                                </select>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-dark" data-dismiss="modal">@lang('Close')</button>
                        <button type="submit" class="btn bg-pink-500 text-white active:bg-pink-600 focus:ring-pink-500" id="btn-save" value="add">@lang('Save')</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- EDIT MODAL --}}
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">@lang('Edit Language')</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">×</span></button>
                </div>
                <form method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group row">
                            <div class="md:w-1/3 pr-4 pl-4">
                                <label for="inputName" class="font-weight-bold">@lang('Name')</label>
                            </div>
                            <div class="md:w-2/3 pr-4 pl-4">
                                <input type="text" class="form-control has-error bold " id="code" name="name" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="status" class="sm:w-1/3 pr-4 pl-4 control-label">Direction<span
                                    class="text-danger">*</span></label>

                            <div class="sm:w-2/3 pr-4 pl-4">
                                <select class="form-control direction_update" name="direction">

                                </select>
                            </div>
                        </div>

                        <div class="form-row form-group">
                            <div class="md:w-1/3 pr-4 pl-4">
                                <label class="font-weight-bold">@lang('Default Language')</label>
                            </div>
                            <div class="md:w-2/3 pr-4 pl-4">
                                <label class="switch">
                                    <input type="checkbox" name="default">
                                    <span class="slider round"></span>
                                </label>
                            </div>

                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-dark" data-dismiss="modal">@lang('Close')</button>
                        <button type="submit" class="btn bg-pink-500 text-white active:bg-pink-600 focus:ring-pink-500" id="btn-save" value="add">@lang('Update')</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- DELETE MODAL --}}
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">@lang('Confirmation Alert')</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <form method="post" action="">
                    @csrf
                    {{ method_field('delete') }}
                    <input type="hidden" name="delete_id" id="delete_id" class="delete_id" value="0">
                    <div class="modal-body">
                        <p class="text-muted">@lang('Are you sure to Delete ?')</p>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-dark" data-dismiss="modal">@lang('No')</button>
                        <button type="submit" class="btn btn-danger deleteButton">@lang('Yes')</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection


@push('script')
    <script>
        "use strict";
        (function($) {



            $('.editBtn').on('click', function() {
                var modal = $('#editModal');
                var url = $(this).data('url');
                var lang = $(this).data('lang');

                modal.find('form').attr('action', url);
                modal.find('input[name=name]').val(lang.name);

                modal.find('select[name=text_align]').val(lang.text_align);

                if (lang.is_default == 1) {
                    modal.find('input[name=default]').attr('checked', 'checked');
                } else {
                    modal.find('input[name=default]').removeAttr('checked');
                }

                if (lang.direction == 'rtl') {
                    $('.direction_update').html(`
                        <option value="rtl" selected>RTL</option>
                        <option value="ltr">LTR</option>
                    `);
                } else {
                    $('.direction_update').html(`
                        <option value="rtl" >RTL</option>
                        <option value="ltr" selected>LTR</option>
                    `);
                }

                modal.modal('show');
            });

            $('.deleteBtn').on('click', function() {
                var modal = $('#deleteModal');
                var url = $(this).data('url');

                console.log(url);

                modal.find('form').attr('action', url);
                modal.modal('show');
            });
        })(jQuery);
    </script>
@endpush
