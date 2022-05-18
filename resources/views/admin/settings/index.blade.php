@extends('layouts.dashboard')
@section('title', __('Settings'))
@section('content')
    <div class="card bg-white dark:bg-dark-eval-1">
        <div class="p-6 rounded-t rounded-r mb-0 border-b border-slate-200">
            <div class="card-header-container flex flex-wrap">
                <h6 class="text-xl font-bold text-zinc-700 dark:text-zinc-300">
                    {{ __('Settings') }}
                </h6>
            </div>
        </div>
        <div x-data="{
            openTab: 1,
            openTab: 2,
            activeClasses: 'border rounded-t text-blue-500',
            inactiveClasses: 'text-blue-600 hover:text-blue-800'
        }" class="p-4">
            <ul class="flex border-b">
                <li @click="openTab = 1" :class="{ '-mb-px': openTab === 1 }" class="-mb-px mr-1">
                    <a :class="openTab === 1 ? activeClasses : inactiveClasses"
                        class="inline-block py-2 px-4 text-blue-500 hover:text-blue-800 font-semibold" href="#">
                        {{ __('General Settings') }}</a>
                </li>
                <li @click="openTab = 2" :class="{ '-mb-px': openTab === 2 }" class="-mb-px mr-1">
                    <a :class="openTab === 2 ? activeClasses : inactiveClasses"
                        class="inline-block py-2 px-4 text-blue-500 hover:text-blue-800 font-semibold" href="#">
                        {{ __('Email Settings') }}</a>
                </li>
            </ul>
            <div class="w-full pt-4">
                <div x-show="openTab === 1">
                    <div>
                        <!-- Validation Errors -->
                        <x-auth-validation-errors class="mb-4" :errors="$errors" />


                        <form action="{{ route('admin.business_setup') }}" method="post" enctype="multipart/form-data">
                            @csrf

                            <div class="w-full flex flex-wrap">
                                <div class="lg:w-1/2 sm:w-full px-2 @error('website_title') has-error @enderror">
                                    <x-label for="website_title" :value="__('Website title')" />
                                    <input type="text" name="website_title"
                                        class="p-3 leading-5 bg-white dark:bg-dark-eval-2 text-gray-700 dark:text-gray-300 rounded border border-gray-300 mb-1 text-sm w-full focus:shadow-outline-blue focus:border-blue-500"
                                        value="{{ $website_title->value ?? '' }}"
                                        placeholder="{{ __('Enter website title') }}">
                                    <x-input-error for="website_title" />
                                </div>
                                <div class="lg:w-1/2 sm:w-full px-2">
                                    <x-label for="base_color" :value="__('Theme Color')" />
                                    <input type="text" name="base_color"
                                        class="p-3 leading-5 bg-white dark:bg-dark-eval-2 text-gray-700 dark:text-gray-300 rounded border border-gray-300 mb-1 text-sm w-full focus:shadow-outline-blue focus:border-blue-500"
                                        value="{{ $base_color->value ?? '' }}" placeholder="#000000">
                                </div>
                                <div class="lg:w-1/2 sm:w-full mt-2 px-2 @error('email') has-error @enderror">
                                    <x-label for="email" :value="__('Email')" />
                                    <input
                                        class="p-3 leading-5 bg-white dark:bg-dark-eval-2 text-gray-700 dark:text-gray-300 rounded border border-gray-300 mb-1 text-sm w-full focus:shadow-outline-blue focus:border-blue-500"
                                        type="email" name="email" id="email" value="{{ $email->value ?? '' }}"
                                        placeholder="{{ __('Enter your Email address') }}" />
                                    <x-input-error for="email" />
                                </div>
                                <div class="lg:w-1/2 sm:w-full mt-2 px-2 @error('phone_number') has-error @enderror">
                                    <x-label for="phone_number" :value="__('Phone Number')" />
                                    <input
                                        class="p-3 leading-5 bg-white dark:bg-dark-eval-2 text-gray-700 dark:text-gray-300 rounded border border-gray-300 mb-1 text-sm w-full focus:shadow-outline-blue focus:border-blue-500"
                                        name="phone_number" type="text" name="phone_number"
                                        value="{{ $phone_number->value ?? '' }}"
                                        placeholder="{{ __('Enter your Phone Number') }}" id="phone_number" />
                                    <x-input-error for="phone_number" />
                                </div>
                                <div class="w-full mt-2 px-2 @error('address') has-error @enderror">
                                    <x-label for="address" :value="__('Address')" />
                                    <input
                                        class="p-3 leading-5 bg-white dark:bg-dark-eval-2 text-gray-700 dark:text-gray-300 rounded border border-gray-300 mb-1 text-sm w-full focus:shadow-outline-blue focus:border-blue-500"
                                        type="text" name="address" value="{{ $address->value ?? '' }}"
                                        placeholder="{{ __('Enter your address') }}" id="address" />
                                    <x-input-error for="address" />
                                </div>
                                <div class="w-full mt-2 px-2 @error('footer_text') has-error @enderror">
                                    <x-label for="footer_text" :value="__('Footer Text')" />
                                    <textarea rows="4" class="p-3 leading-5 bg-white dark:bg-dark-eval-2 text-gray-700 dark:text-gray-300 rounded border border-gray-300 mb-1 text-sm w-full focus:shadow-outline-blue focus:border-blue-500"
                                        type="text" name="footer_text" placeholder="{{ __('Enter footer text') }}"
                                        id="footer_text">
                                        {{ $footer_text->value ?? '' }}
                                    </textarea>
                                    <x-input-error for="footer_text" />
                                </div>
                                <div class="w-full mt-2 px-2 @error('copyright_text') has-error @enderror">
                                    <x-label for="copyright_text" :value="__('Copyright Text')" />
                                    <textarea rows="4" class="p-3 leading-5 bg-white dark:bg-dark-eval-2 text-gray-700 dark:text-gray-300 rounded border border-gray-300 mb-1 text-sm w-full focus:shadow-outline-blue focus:border-blue-500"
                                        wire:model="copyright_text" type="text" name="copyright_text"
                                        placeholder="{{ __('Enter copyright text') }}" id="copyright_text">
                    {{ $copyright_text->value ?? '' }}
                </textarea>
                                    <x-input-error for="copyright_text" />
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-sm-6">
                                    @php($logo = \App\Models\Setting::where('key', 'site_logo')->first())
                                    @php($site_logo = $site_logo->value ?? '')
                                    <div class="form-group">
                                        <label class="input-label d-inline">{{ __('logo') }}</label><small
                                            style="color: red">* ( {{ __('ratio') }} 3:1 )</small>
                                        <div class="custom-file mb-3">
                                            <input type="file" name="site_logo" id="customFileEg1" class="custom-file-input"
                                                accept=".jpg, .png, .jpeg, .gif, .bmp, .tif, .tiff|image/*">
                                            <label class="custom-file-label" for="customFileEg1">{{ __('choose') }}
                                                {{ __('file') }}</label>
                                        </div>

                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    @php($icon = \App\Models\Setting::where('key', 'fav_icon')->first())
                                    @php($fav_icon = $fav_icon->value ?? '')
                                    <div class="form-group">
                                        <label class="input-label d-inline">{{ __('Fav Icon') }}</label><small
                                            style="color: red">* ( {{ __('ratio') }} 1:1 )</small>
                                        <div class="custom-file mb-3">
                                            <input type="file" name="fav_icon" id="favIconUpload" class="custom-file-input"
                                                accept=".jpg, .png, .jpeg, .gif, .bmp, .tif, .tiff|image/*">
                                            <label class="custom-file-label" for="favIconUpload">{{ __('choose') }}
                                                {{ __('file') }}</label>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <div class="w-full flex flex-wrap">
                                <div class="lg:w-1/2 sm:w-full px-2 @error('social_facebook') has-error @enderror">
                                    <x-label for="social_facebook" :value="__('Facebook Link')" />
                                    <input
                                        class="p-3 leading-5 bg-white dark:bg-dark-eval-2 text-gray-700 dark:text-gray-300 rounded border border-gray-300 mb-1 text-sm w-full focus:shadow-outline-blue focus:border-blue-500"
                                        type="text" value="{{ $social_facebook->value ?? '' }}" id="social_facebook"
                                        name="social_facebook" />
                                    <x-input-error for="social_facebook" />
                                </div>
                                <div class="lg:w-1/2 sm:w-full px-2 @error('social_twitter') has-error @enderror">
                                    <x-label for="social_twitter" :value="__('Twitter Link')" />
                                    <input
                                        class="p-3 leading-5 bg-white dark:bg-dark-eval-2 text-gray-700 dark:text-gray-300 rounded border border-gray-300 mb-1 text-sm w-full focus:shadow-outline-blue focus:border-blue-500"
                                        wire:model="social_twitter" type="text"
                                        value="{{ $social_twitter->value ?? '' }}" id="social_twitter"
                                        name="social_twitter" />
                                    <x-input-error for="social_twitter" />
                                </div>
                                <div class="lg:w-1/2 sm:w-full px-2 @error('social_instagram') has-error @enderror">
                                    <x-label for="social_instagram" :value="__('Instagram Link')" />
                                    <input
                                        class="p-3 leading-5 bg-white dark:bg-dark-eval-2 text-gray-700 dark:text-gray-300 rounded border border-gray-300 mb-1 text-sm w-full focus:shadow-outline-blue focus:border-blue-500"
                                        wire:model="social_instagram" type="text"
                                        value="{{ $social_instagram->value ?? '' }}" id="social_instagram"
                                        name="social_instagram" />
                                    <x-input-error for="social_instagram" />
                                </div>
                                <div class="lg:w-1/2 sm:w-full px-2 @error('social_linkedin') has-error @enderror">
                                    <x-label for="social_linkedin" :value="__('Linkedin Link')" />
                                    <input
                                        class="p-3 leading-5 bg-white dark:bg-dark-eval-2 text-gray-700 dark:text-gray-300 rounded border border-gray-300 mb-1 text-sm w-full focus:shadow-outline-blue focus:border-blue-500"
                                        type="text" value="{{ $social_linkedin->value ?? '' }}" id="social_linkedin"
                                        name="social_linkedin" />
                                    <x-input-error for="social_linkedin" />
                                </div>
                                <div class="lg:w-1/2 sm:w-full px-2 @error('social_whatsapp') has-error @enderror">
                                    <x-label for="social_whatsapp" :value="__('Whatsapp number')" />
                                    <input
                                        class="p-3 leading-5 bg-white dark:bg-dark-eval-2 text-gray-700 dark:text-gray-300 rounded border border-gray-300 mb-1 text-sm w-full focus:shadow-outline-blue focus:border-blue-500"
                                        type="text" value="{{ $social_whatsapp->value ?? '' }}" id="social_whatsapp"
                                        name="social_whatsapp" />
                                    <x-input-error for="social_whatsapp" />
                                    <small
                                        class="text-red-500">{{ __("Use this number format 1XXXXXXXXXX Don't use this +001-(XXX)XXXXXXX") }}</small>
                                </div>
                            </div>
                            <div class="w-full">
                                <div class="mb-4 px-2">
                                    <x-label for="head_tags" :value="__('Custom Head Code')" />
                                    <textarea class="p-3 leading-5 bg-white dark:bg-dark-eval-2 text-gray-700 dark:text-gray-300 rounded border border-gray-300 mb-1 text-sm w-full focus:shadow-outline-blue focus:border-blue-500"
                                        rows="4" id="head_tags" name="head_tags">{!! $head_tags->value ?? '' !!}</textarea>
                                    <small
                                        class="text-red-500">{{ __('Facebook, Google Analytics or other script.') }}</small>
                                </div>
                                <div class="mb-4 px-2">
                                    <x-label for="body_tags" :value="__('Custom Body Code')" />
                                    <textarea class="p-3 leading-5 bg-white dark:bg-dark-eval-2 text-gray-700 dark:text-gray-300 rounded border border-gray-300 mb-1 text-sm w-full focus:shadow-outline-blue focus:border-blue-500"
                                        rows="4" id="body_tags"
                                        name="body_tags">{{ $body_tags->value ?? '' }}</textarea>
                                    <small
                                        class="text-red-500">{{ __('Facebook, Google Analytics or other script.') }}</small>

                                </div>
                            </div>
                            <div class="w-full flex flex-row">
                                <div class="sm:w-1/2 mb-4 px-2">
                                    <x-label for="is_cooki_alert" :value="__('Enable Cookie')" />
                                    <x-checkbox name="is_cooki_alert" id="is_cooki_alert" wire:model="is_cooki_alert" />
                                </div>
                                <div class="sm:w-1/2 mb-4 px-2">
                                    <x-label for="is_whatsapp" :value="__('Enable Whatsapp')" />
                                    <x-checkbox name="is_whatsapp" id="is_whatsapp" wire:model="is_whatsapp" />
                                </div>
                            </div>
                            <div class="flex flex-wrap mb-4">
                                <div class="lg:w-1/2 sm:w-full px-2">
                                    <x-label for="currency_code" :value="__('Currency code')" />
                                    <input
                                        class="p-3 leading-5 bg-white dark:bg-dark-eval-2 text-gray-700 dark:text-gray-300 rounded border border-gray-300 mb-1 text-sm w-full focus:shadow-outline-blue focus:border-blue-500"
                                        wire:model="currency_code" type="text"
                                        value="{{ config('settings.currency_code') }}" id="currency_code"
                                        name="currency_code" />
                                    <x-input-error for="currency_code" />
                                </div>
                                <div class="lg:w-1/2 sm:w-full px-2">
                                    <x-label for="currency_symbol" :value="__('Currency symbol')" />
                                    <input
                                        class="p-3 leading-5 bg-white dark:bg-dark-eval-2 text-gray-700 dark:text-gray-300 rounded border border-gray-300 mb-1 text-sm w-full focus:shadow-outline-blue focus:border-blue-500"
                                        wire:model="currency_symbol" type="text"
                                        value="{{ config('settings.currency_symbol') }}" id="currency_symbol"
                                        name="currency_symbol" />
                                    <x-input-error for="currency_symbol" />
                                </div>
                            </div>
                            <div class="w-full">
                                <div class="mb-4 px-2">
                                    <x-label for="meta_keywords" :value="__('Seo Meta Title')" />
                                    <input
                                        class="p-3 leading-5 bg-white dark:bg-dark-eval-2 text-gray-700 dark:text-gray-300 rounded border border-gray-300 mb-1 text-sm w-full focus:shadow-outline-blue focus:border-blue-500"
                                        type="text" value="{{ $meta_keywords->value ?? '' }}" id="meta_keywords"
                                        name="meta_keywords" />
                                    <x-input-error for="meta_keywords" />
                                </div>
                                <div class="mb-4 px-2">
                                    <x-label for="meta_keywords" :value="__('Seo Meta Description')" />
                                    <input
                                        class="p-3 leading-5 bg-white dark:bg-dark-eval-2 text-gray-700 dark:text-gray-300 rounded border border-gray-300 mb-1 text-sm w-full focus:shadow-outline-blue focus:border-blue-500"
                                        type="text" value="{{ $meta_description->value ?? '' }}" id="meta_keywords"
                                        name="meta_keywords" />
                                    <x-input-error for="meta_keywords" />
                                </div>
                            </div>
                            <div class="w-full">
                                <div class="mb-4 px-2 @error('announcement') has-error @enderror">
                                    <x-label for="announcement" :value="__('Footer Copyright Text')" />
                                    <input
                                        class="p-3 leading-5 bg-white dark:bg-dark-eval-2 text-gray-700 dark:text-gray-300 rounded border border-gray-300 mb-1 text-sm w-full focus:shadow-outline-blue focus:border-blue-500"
                                        type="text" value="{{ $announcement->value ?? '' }}" id="announcement"
                                        name="announcement" />
                                    <x-input-error for="announcement" />
                                </div>
                                <div class="mb-4 px-2 @error('cookie_alert_text') has-error @enderror">
                                    <x-label for="cookie_alert_text" :value="__('Footer Copyright Text')" />
                                    <input
                                        class="p-3 leading-5 bg-white dark:bg-dark-eval-2 text-gray-700 dark:text-gray-300 rounded border border-gray-300 mb-1 text-sm w-full focus:shadow-outline-blue focus:border-blue-500"
                                        wire:model="cookie_alert_text" type="text"
                                        value="{{ $cookie_alert_text->value ?? '' }}" id="cookie_alert_text"
                                        name="cookie_alert_text" />
                                    <x-input-error for="cookie_alert_text" />
                                </div>
                            </div>
                            <div class="float-right p-2 mb-4">
                                <button type="submit"
                                    class="md:text-sm sm:text-xs bg-blue-900 text-white hover:text-blue-800 hover:bg-blue-100 active:bg-blue-200 focus:ring-blue-300 text-sm font-bold uppercase px-6 py-2 rounded-md shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150 w-full">{{ __('Update') }}</button>
                            </div>
                        </form>
                    </div>

                </div>
                <div x-show="openTab === 2">
                    @livewire('admin.settings.smtp')
                </div>
            </div>
        </div>
    </div>
@endsection
