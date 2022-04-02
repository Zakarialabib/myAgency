@extends('layouts.dashboard')
@section('title', __('Edit - ') . ($bcategory->title))
@section('content')
@section('content')
<div class="card bg-white dark:bg-dark-eval-1">
    <div class="p-6 rounded-t rounded-r mb-0 border-b border-slate-200">
        <div class="card-header-container flex flex-wrap">
            <h6 class="text-xl font-bold text-zinc700 dark:text-zinc300">
                {{ __('Bcategory') }} - 
                    {{ $bcategory->title }}
            </h6>
            <a href="{{ route('admin.bcategories.index') . '?language=' . $currentLang->code }}"
                class="btn btn-primary btn-sm">
                <i class="fas fa-angle-double-left"></i> {{ __('Back') }}
            </a>
        </div>
    </div>
    <div class="p-4">
        @livewire('admin.bcategory.edit', [$bcategory])
    </div>
</div>
@endsection