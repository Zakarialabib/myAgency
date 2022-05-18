<div>
    <!-- Validation Errors -->
    <x-auth-validation-errors class="mb-4" :errors="$errors" />
    
    <x-select-list
        class="p-3 leading-5 bg-white dark:bg-dark-eval-2 text-zinc-700 dark:text-zinc-300 rounded border border-zinc-300 mb-1 text-sm w-full focus:shadow-outline-blue focus:border-blue-500"
        required id="language_id" name="language_id" wire:model="language_id" :options="$this->listsForFields['languages']" />

    <form wire:submit.prevent="save" enctype="multipart/form-data">

        <div class="w-full flex flex-wrap">
            <div class="lg:w-1/2 sm:w-full px-2 @error('website_title') has-error @enderror">
                @php($admin_commission=\App\Models\BusinessSetting::where('key','website_title')->first())
                <x-label for="website_title" :value="__('Website title')" />
                <input type="text" wire:model="website_title" id="website_title"
                    class="p-3 leading-5 bg-white dark:bg-dark-eval-2 text-gray-700 dark:text-gray-300 rounded border border-gray-300 mb-1 text-sm w-full focus:shadow-outline-blue focus:border-blue-500"
                    value="{{$website_title?$website_title->value:0}}" placeholder="{{ __('Enter website title') }}">
                <x-input-error for="website_title" />
            </div>
            <div class="lg:w-1/2 sm:w-full px-2">
                <x-label for="base_color" :value="__('Theme Color')" />
                <input type="text"
                    class="p-3 leading-5 bg-white dark:bg-dark-eval-2 text-gray-700 dark:text-gray-300 rounded border border-gray-300 mb-1 text-sm w-full focus:shadow-outline-blue focus:border-blue-500"
                    value="{{ $setting->base_color }}" placeholder="#000000" name="base_color">
            </div>
            <div class="lg:w-1/2 sm:w-full mt-2 px-2 @error('email') has-error @enderror">
                <x-label for="email" :value="__('Email')" />
                <input
                    class="p-3 leading-5 bg-white dark:bg-dark-eval-2 text-gray-700 dark:text-gray-300 rounded border border-gray-300 mb-1 text-sm w-full focus:shadow-outline-blue focus:border-blue-500"
                    wire:model="email" type="email" name="email" value="{{ $setting->phone_number }}"
                    placeholder="{{ __('Enter your Email address') }}" id="email" />
                <x-input-error for="email" />
            </div>
            <div class="lg:w-1/2 sm:w-full mt-2 px-2 @error('phone_number') has-error @enderror">
                <x-label for="phone_number" :value="__('Phone Number')" />
                <input
                    class="p-3 leading-5 bg-white dark:bg-dark-eval-2 text-gray-700 dark:text-gray-300 rounded border border-gray-300 mb-1 text-sm w-full focus:shadow-outline-blue focus:border-blue-500"
                    wire:model="phone_number" type="text" name="phone_number" value="{{ $setting->phone_number }}"
                    placeholder="{{ __('Enter your Phone Number') }}" id="phone_number" />
                <x-input-error for="phone_number" />
            </div>
            <div class="w-full mt-2 px-2 @error('address') has-error @enderror">
                <x-label for="address" :value="__('Address')" />
                <input
                    class="p-3 leading-5 bg-white dark:bg-dark-eval-2 text-gray-700 dark:text-gray-300 rounded border border-gray-300 mb-1 text-sm w-full focus:shadow-outline-blue focus:border-blue-500"
                    wire:model="address" type="text" name="address" value="{{ $setting->address }}"
                    placeholder="{{ __('Enter your address') }}" id="address" />
                <x-input-error for="address" />
            </div>
            <div class="w-full mt-2 px-2 @error('footer_text') has-error @enderror">
                <x-label for="footer_text" :value="__('Footer Text')" />
                <textarea rows="4" class="p-3 leading-5 bg-white dark:bg-dark-eval-2 text-gray-700 dark:text-gray-300 rounded border border-gray-300 mb-1 text-sm w-full focus:shadow-outline-blue focus:border-blue-500"
                    wire:model="footer_text" type="text" name="footer_text"
                    placeholder="{{ __('Enter footer text') }}" id="footer_text">
                    {{ $setting->footer_text }}
                </textarea>
                <x-input-error for="footer_text" />
            </div>
            <div class="w-full mt-2 px-2 @error('copyright_text') has-error @enderror">
                <x-label for="copyright_text" :value="__('Copyright Text')" />
                <textarea rows="4" class="p-3 leading-5 bg-white dark:bg-dark-eval-2 text-gray-700 dark:text-gray-300 rounded border border-gray-300 mb-1 text-sm w-full focus:shadow-outline-blue focus:border-blue-500"
                    wire:model="copyright_text" type="text" name="copyright_text"
                    value="{{ $setting->copyright_text }}" placeholder="{{ __('Enter copyright text') }}"
                    id="copyright_text">
                    {{ $setting->copyright_text }}
                </textarea>
                <x-input-error for="copyright_text" />
            </div>
        </div>

        <div class="mt-5 flex flex-wrap">
            <div class="lg:w-1/2 sm:w-full px-2">
                <div class="flex flex-col">
                    <div class="w-1/2">
                        @if ($siteImage != null)
                            <img src="{{ asset('uploads/' . $siteImage) }}" id="logoImg"
                                style="width: 200px; height: 150px;">
                        @else
                            <img src="https://via.placeholder.com/250x150?text=Placeholder+Image" id="logoImg"
                                style="width: 200px; height: 150px;">
                        @endif
                    </div>
                    <div class="w-3/4">
                        <div class="mb-4 @error('logoFile') has-error @enderror">
                            <x-label for="logoFile" :value="__('Import Logo')" />
                            <input
                                class="p-3 leading-5 bg-white dark:bg-dark-eval-2 text-gray-700 dark:text-gray-300 rounded border border-gray-300 mb-1 text-sm w-full focus:shadow-outline-blue focus:border-blue-500"
                                type="file" wire:model="logoFile" onchange="loadFile(event,'logoImg')" />
                            <x-input-error for="logoFile" />

                            <div class="mt-5">
                                <button type="submit" wire:click.prevent='uploadLogo()'
                                    class="leading-4 md:text-sm sm:text-xs bg-blue-600 text-white hover:text-blue-100 hover:bg-blue-800 active:bg-blue-200 focus:ring-blue-300 font-medium uppercase px-6 py-2 rounded-md shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150">
                                    <x-heroicon-o-upload class="mr-2 h-4 w-4" />
                                    {{ __('Import') }}
                                </button>
                            </div>
                            <small
                                class="text-red-500">{{ __('Extensions accepted (jpeg,png,jpg,gif,svg), Max size 1048kb.') }}</small>
                        </div>
                    </div>
                </div>
            </div>

            <div class="lg:w-1/2 sm:w-full px-2">
                <div class="flex flex-col">
                    <div class="w-1/2">
                        @if ($favicon != null)
                            <img src="{{ asset('uploads/' . $favicon) }}" id="logoImg"
                                style="width: 200px; height: 150px;">
                        @else
                            <img src="https://via.placeholder.com/250x150?text=Placeholder+Image" id="logoImg"
                                style="width: 200px; height: 150px;">
                        @endif
                    </div>
                    <div class="w-3/4">
                        <div class="mb-4 @error('iconFile') has-error @enderror">
                            <x-label for="iconFile" :value="__('Import favicon')" />
                            <input
                                class="p-3 leading-5 bg-white dark:bg-dark-eval-2 text-gray-700 dark:text-gray-300 rounded border border-gray-300 mb-1 text-sm w-full focus:shadow-outline-blue focus:border-blue-500"
                                type="file" wire:model="iconFile" />
                            <x-input-error for="iconFile" />

                            <div class="mt-5">
                                <button type="submit" wire:click.prevent='uploadFavicon()'
                                    class="leading-4 md:text-sm sm:text-xs bg-blue-600 text-white hover:text-blue-100 hover:bg-blue-800 active:bg-blue-200 focus:ring-blue-300 font-medium uppercase px-6 py-2 rounded-md shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150">
                                    <x-heroicon-o-upload class="mr-2 h-4 w-4" />
                                    {{ __('Import') }}
                                </button>
                            </div>
                            <small
                                class="text-red-500">{{ __('Extensions accepted (jpeg,png,jpg,gif,svg), Max size 1048kb.') }}</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="w-full flex flex-wrap">
            <div class="lg:w-1/2 sm:w-full px-2 @error('social_facebook') has-error @enderror">
                <x-label for="social_facebook" :value="__('Facebook Link')" />
                <input
                    class="p-3 leading-5 bg-white dark:bg-dark-eval-2 text-gray-700 dark:text-gray-300 rounded border border-gray-300 mb-1 text-sm w-full focus:shadow-outline-blue focus:border-blue-500"
                    wire:model="social_facebook" type="text" value="{{ $setting->social_facebook }}"
                    id="social_facebook" name="social_facebook" />
                <x-input-error for="social_facebook" />
            </div>
            <div class="lg:w-1/2 sm:w-full px-2 @error('social_twitter') has-error @enderror">
                <x-label for="social_twitter" :value="__('Twitter Link')" />
                <input
                    class="p-3 leading-5 bg-white dark:bg-dark-eval-2 text-gray-700 dark:text-gray-300 rounded border border-gray-300 mb-1 text-sm w-full focus:shadow-outline-blue focus:border-blue-500"
                    wire:model="social_twitter" type="text" value="{{ $setting->social_twitter }}"
                    id="social_twitter" name="social_twitter" />
                <x-input-error for="social_twitter" />
            </div>
            <div class="lg:w-1/2 sm:w-full px-2 @error('social_instagram') has-error @enderror">
                <x-label for="social_instagram" :value="__('Instagram Link')" />
                <input
                    class="p-3 leading-5 bg-white dark:bg-dark-eval-2 text-gray-700 dark:text-gray-300 rounded border border-gray-300 mb-1 text-sm w-full focus:shadow-outline-blue focus:border-blue-500"
                    wire:model="social_instagram" type="text" value="{{ $setting->social_instagram }}"
                    id="social_instagram" name="social_instagram" />
                <x-input-error for="social_instagram" />
            </div>
            <div class="lg:w-1/2 sm:w-full px-2 @error('social_linkedin') has-error @enderror">
                <x-label for="social_linkedin" :value="__('Linkedin Link')" />
                <input
                    class="p-3 leading-5 bg-white dark:bg-dark-eval-2 text-gray-700 dark:text-gray-300 rounded border border-gray-300 mb-1 text-sm w-full focus:shadow-outline-blue focus:border-blue-500"
                    wire:model="social_linkedin" type="text" value="{{ $setting->social_linkedin }}"
                    id="social_linkedin" name="social_linkedin" />
                <x-input-error for="social_linkedin" />
            </div>
            <div class="lg:w-1/2 sm:w-full px-2 @error('social_whatsapp') has-error @enderror">
                <x-label for="social_whatsapp" :value="__('Whatsapp number')" />
                <input
                    class="p-3 leading-5 bg-white dark:bg-dark-eval-2 text-gray-700 dark:text-gray-300 rounded border border-gray-300 mb-1 text-sm w-full focus:shadow-outline-blue focus:border-blue-500"
                    wire:model="social_whatsapp" type="text" value="{{ $setting->social_whatsapp }}"
                    id="social_whatsapp" name="social_whatsapp" />
                <x-input-error for="social_whatsapp" />
                <small
                    class="text-red-500">{{ __("Use this number format 1XXXXXXXXXX Don't use this +001-(XXX)XXXXXXX") }}</small>
            </div>
        </div>
        <div class="w-full">
            <div class="mb-4 px-2">
                <x-label for="head_tags" :value="__('Custom Head Code')" />
                <textarea class="p-3 leading-5 bg-white dark:bg-dark-eval-2 text-gray-700 dark:text-gray-300 rounded border border-gray-300 mb-1 text-sm w-full focus:shadow-outline-blue focus:border-blue-500"
                    rows="4" id="head_tags" name="head_tags">{!! $setting->head_tags !!}</textarea>
                <small class="text-red-500">{{ __('Facebook, Google Analytics or other script.') }}</small>
            </div>
            <div class="mb-4 px-2">
                <x-label for="body_tags" :value="__('Custom Body Code')" />
                <textarea class="p-3 leading-5 bg-white dark:bg-dark-eval-2 text-gray-700 dark:text-gray-300 rounded border border-gray-300 mb-1 text-sm w-full focus:shadow-outline-blue focus:border-blue-500"
                    rows="4" id="body_tags" name="body_tags">{{ $setting->body_tags }}</textarea>
                <small class="text-red-500">{{ __('Facebook, Google Analytics or other script.') }}</small>

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
                    wire:model="currency_code" type="text" value="{{ config('settings.currency_code') }}"
                    id="currency_code" name="currency_code" />
                <x-input-error for="currency_code" />
            </div>
            <div class="lg:w-1/2 sm:w-full px-2">
                <x-label for="currency_symbol" :value="__('Currency symbol')" />
                <input
                    class="p-3 leading-5 bg-white dark:bg-dark-eval-2 text-gray-700 dark:text-gray-300 rounded border border-gray-300 mb-1 text-sm w-full focus:shadow-outline-blue focus:border-blue-500"
                    wire:model="currency_symbol" type="text" value="{{ config('settings.currency_symbol') }}"
                    id="currency_symbol" name="currency_symbol" />
                <x-input-error for="currency_symbol" />
            </div>
        </div>
        <div class="w-full">
            <div class="mb-4 px-2">
                <x-label for="meta_keywords" :value="__('Seo Meta Title')" />
                <input
                    class="p-3 leading-5 bg-white dark:bg-dark-eval-2 text-gray-700 dark:text-gray-300 rounded border border-gray-300 mb-1 text-sm w-full focus:shadow-outline-blue focus:border-blue-500"
                    wire:model="meta_keywords" type="text" value="{{ $setting->meta_keywords }}" id="meta_keywords"
                    name="meta_keywords" />
                <x-input-error for="meta_keywords" />
            </div>
            <div class="mb-4 px-2">
                <x-label for="meta_keywords" :value="__('Seo Meta Description')" />
                <input
                    class="p-3 leading-5 bg-white dark:bg-dark-eval-2 text-gray-700 dark:text-gray-300 rounded border border-gray-300 mb-1 text-sm w-full focus:shadow-outline-blue focus:border-blue-500"
                    wire:model="meta_keywords" type="text" value="{{ $setting->meta_description }}"
                    id="meta_keywords" name="meta_keywords" />
                <x-input-error for="meta_keywords" />
            </div>
        </div>
        <div class="w-full">
            <div class="mb-4 px-2 @error('announcement') has-error @enderror">
                <x-label for="announcement" :value="__('Footer Copyright Text')" />
                <input
                    class="p-3 leading-5 bg-white dark:bg-dark-eval-2 text-gray-700 dark:text-gray-300 rounded border border-gray-300 mb-1 text-sm w-full focus:shadow-outline-blue focus:border-blue-500"
                    wire:model="announcement" type="text" value="{{ $setting->announcement }}" id="announcement"
                    name="announcement" />
                <x-input-error for="announcement" />
            </div>
            <div class="mb-4 px-2 @error('cookie_alert_text') has-error @enderror">
                <x-label for="cookie_alert_text" :value="__('Footer Copyright Text')" />
                <input
                    class="p-3 leading-5 bg-white dark:bg-dark-eval-2 text-gray-700 dark:text-gray-300 rounded border border-gray-300 mb-1 text-sm w-full focus:shadow-outline-blue focus:border-blue-500"
                    wire:model="cookie_alert_text" type="text" value="{{ $setting->cookie_alert_text }}"
                    id="cookie_alert_text" name="cookie_alert_text" />
                <x-input-error for="cookie_alert_text" />
            </div>
        </div>
        <div class="float-right p-2 mb-4">
            <button type="submit"
                class="md:text-sm sm:text-xs bg-blue-900 text-white hover:text-blue-800 hover:bg-blue-100 active:bg-blue-200 focus:ring-blue-300 text-sm font-bold uppercase px-6 py-2 rounded-md shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150 w-full">{{ __('Update') }}</button>
        </div>
    </form>
</div>
