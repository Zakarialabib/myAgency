@extends('layouts.dashboard')
@section('title', __('Edit - ') . ($blog->title))
@section('content')
    <div class="card bg-white dark:bg-dark-eval-1">
        <div class="p-6 rounded-t rounded-r mb-0 border-b border-slate-200">
            <div class="card-header-container flex flex-wrap">
                <h6 class="text-xl font-bold text-zinc700 dark:text-zinc300">
                    {{ __('Blog') }} - 
                        {{ $blog->title }}
                </h6>
                <a href="{{ route('admin.blogs.index')  }}"
                    class=" leading-4 md:text-sm sm:text-xs bg-blue-900 text-white hover:text-blue-800 hover:bg-blue-100 active:bg-blue-200 focus:ring-blue-300 font-medium uppercase px-6 py-2 rounded-md shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150 btn-sm">
                    <i class="fas fa-angle-double-left"></i> {{ __('Back') }}
                </a>
            </div>
        </div>
        <div class="p-4">
            @livewire('admin.blog.edit', [$blog])
        </div>
    </div>
@endsection
