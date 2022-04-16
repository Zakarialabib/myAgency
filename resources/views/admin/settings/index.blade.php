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
                    @livewire('admin.settings.index')
                </div>
                <div x-show="openTab === 2">
                    @livewire('admin.settings.smtp')
                </div>
            </div>
        </div>
    </div>
@endsection
