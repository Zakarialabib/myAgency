<div>
    <form wire:submit.prevent="submit" class="py-10">
        <div class="w-full row">
            <label class="col-sm-2 control-label">{{ __('Language') }}<span class="text-danger">*</span></label>

            <select class="form-control lang" name="language_id" id="portfolio_lan">
                <option value="" selected disabled>Select a Language</option>
                @foreach ($langs as $lang)
                    <option value="{{ $lang->id }}">{{ $lang->name }}</option>
                @endforeach
            </select>
            @if ($errors->has('language_id'))
                <p class="text-danger"> {{ $errors->first('language_id') }} </p>
            @endif
        </div>

        <div class="w-full row">
            <label class="col-sm-2 control-label">{{ __('Slider Image ') }}</label>

            <div class="custom-file h80 drop-img">
                <label class="custom-file-label h80 " for="image">
                    <h5 class="text-center">
                        {{ __('Drop Or Select multiple image at a time') }}</h5>
                </label>
                <input type="file" multiple class="custom-file-input h80" name="image[]" id="image">
            </div>

            @if ($errors->has('image'))
                <p class="text-danger"> {{ $errors->first('image') }} </p>
            @endif
            <p class="help-block text-info">
                {{ __('Upload 710X400 (Pixel) Size image for best quality.
                                                                                                                                                                                                            Only jpg, jpeg, png image is allowed.') }}
            </p>
        </div>
        <div class="w-full row">
            <label class="col-sm-2 control-label">{{ __('Featured Image') }}<span
                    class="text-danger">*</span></label>

            <img class="mw-400 mb-3 show-img img-demo" src="{{ asset('assets/admin/img/img-demo.jpg') }}" alt="">
            <div class="custom-file">
                <label class="custom-file-label" for="featured_image">{{ __('Choose Image') }}</label>
                <input type="file" class="custom-file-input up-img" name="featured_image" id="featured_image">
            </div>
            @if ($errors->has('featured_image'))
                <p class="text-danger"> {{ $errors->first('featured_image') }} </p>
            @endif
            <p class="help-block text-info">
                {{ __('Upload 710X400 (Pixel) Size image for best quality.
                                                                                                                                                                                                    Only jpg, jpeg, png image is allowed.') }}
            </p>
        </div>

        <div class="w-full row">
            <label for="title" class="col-sm-2 control-label">{{ __('Title') }}<span
                    class="text-danger">*</span></label>

            <input type="text" class="form-control" name="title" placeholder="Title" value="{{ old('title') }}">
            @if ($errors->has('title'))
                <p class="text-danger"> {{ $errors->first('title') }} </p>
            @endif
        </div>
        <div class="w-full row">
            <label for="client_name" class="col-sm-2 control-label">{{ __('Client Name') }}<span
                    class="text-danger">*</span></label>

            <input type="text" class="form-control" name="client_name" placeholder="Client Name"
                value="{{ old('client_name') }}">
            @if ($errors->has('client_name'))
                <p class="text-danger"> {{ $errors->first('client_name') }} </p>
            @endif
        </div>
        <div class="w-full row">
            <label for="service_id" class="col-sm-2 control-label">{{ __('Category') }}<span
                    class="text-danger">*</span></label>

            <select class="form-control" name="service_id" id="bcategory_id">
            </select>
            @if ($errors->has('service_id'))
                <p class="text-danger"> {{ $errors->first('service_id') }} </p>
            @endif
        </div>
        <div class="w-full row">
            <label for="start_date" class="col-sm-2 control-label">{{ __('Start Date') }}<span
                    class="text-danger">*</span></label>
            <div class="input-group col-sm-10">
                <div class="input-group-prepend">
                    <span class="input-group-text">
                        <i class="far fa-calendar-alt"></i>
                    </span>
                </div>
                <input type="text" class="form-control" name="start_date" id="start_date"
                    placeholder="{{ __('Start Date') }}" value="{{ old('start_date') }}">
                @if ($errors->has('start_date'))
                    <p class="text-danger"> {{ $errors->first('start_date') }} </p>
                @endif
            </div>
        </div>
        <div class="w-full row">
            <label for="submission_date" class="col-sm-2 control-label">{{ __('Submission Date') }}<span
                    class="text-danger">*</span></label>

            <div class="input-group col-sm-10">
                <div class="input-group-prepend">
                    <span class="input-group-text">
                        <i class="far fa-calendar-alt"></i>
                    </span>
                </div>
                <input type="text" class="form-control" name="submission_date" id="submission_date"
                    placeholder="{{ __('Submission Date') }}" value="{{ old('submission_date') }}">
                @if ($errors->has('submission_date'))
                    <p class="text-danger"> {{ $errors->first('submission_date') }} </p>
                @endif
            </div>
        </div>
        <div class="w-full row">
            <label for="client_name" class="col-sm-2 control-label">{{ __('Live Link') }}</label>

            <input type="text" class="form-control" name="link" placeholder="Live Link" value="{{ old('link') }}">
            @if ($errors->has('link'))
                <p class="text-danger"> {{ $errors->first('link') }} </p>
            @endif
        </div>
        <div class="w-full row">
            <label for="status" class="col-sm-2 control-label">{{ __('Status') }}<span
                    class="text-danger">*</span></label>

            <select class="form-control" name="status">
                <option value="0">{{ __('In Progress') }}</option>
                <option value="1" selected>{{ __('Completed') }}</option>
            </select>
            @if ($errors->has('status'))
                <p class="text-danger"> {{ $errors->first('status') }} </p>
            @endif
        </div>

        <div class="w-full row">
            <label for="content" class="col-sm-2 control-label">{{ __('Content') }}<span
                    class="text-danger">*</span></label>

            <textarea name="content" class="form-control summernote" rows="4"
                placeholder="{{ __('Description') }}">{{ old('content') }}</textarea>
            @if ($errors->has('content'))
                <p class="text-danger"> {{ $errors->first('content') }} </p>
            @endif

        </div>

        <div class="w-full row">
            <label for="meta_keywords" class="col-sm-2 control-label">{{ __('Meta Keywords') }}</label>
            <input type="text" class="form-control" data-role="tagsinput" name="meta_keywords"
                placeholder="{{ __('Meta Keywords') }}" value="{{ old('meta_keywords') }}">
            @if ($errors->has('meta_keywords'))
                <p class="text-danger"> {{ $errors->first('meta_keywords') }} </p>
            @endif
        </div>
        <div class="w-full row">
            <label for="meta_description" class="col-sm-2 control-label">{{ __('Meta Description') }}</label>
            <textarea class="form-control" name="meta_description" placeholder="{{ __('Meta Description') }}"
                rows="4">{{ old('meta_description') }}</textarea>
            @if ($errors->has('meta_description'))
                <p class="text-danger"> {{ $errors->first('meta_description') }} </p>
            @endif
        </div>
        <div class="w-full row">
            <label for="name" class="col-sm-2 control-label">{{ __('Order') }}<span
                    class="text-danger">*</span></label>

            <input type="number" class="form-control" name="serial_number" placeholder="{{ __('Order') }}"
                value="0">
            @if ($errors->has('serial_number'))
                <p class="text-danger"> {{ $errors->first('serial_number') }} </p>
            @endif
        </div>
        <div class="w-full row">
            <div class="offset-sm-2 col-sm-10">
                <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
            </div>
        </div>

    </form>
</div>
