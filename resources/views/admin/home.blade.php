@extends('layouts.dashboard')
@section('title', __('Dashboard'))
@section('content')
    <div class="row">
        <div class="card bg-white dark:bg-dark-eval-1 w-full">
            <div class="p-6 rounded-t rounded-r mb-0 border-b border-slate-200">
                <div class="card-row">
                    <h6 class="text-xl font-bold text-zinc700 dark:text-zinc300">
                        {{ __('Dashboard') }}
                    </h6>
                </div>
            </div>
            <div class="p-4">
                <div class="grid gap-6 mb-5 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-2 xl:grid-cols-2 w-full">
                    <div class="flex items-center p-4 bg-slate-50 dark:bg-dark-bg dark:text-zinc300 rounded-lg shadow-xs">
                        <div class="p-5 mr-4 text-orange-500 bg-orange-100 rounded-full ">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z">
                                </path>
                            </svg>
                        </div>
                        <div>
                            <p class="mb-2 text-lg font-medium text-zinc600 dark:text-zinc300">
                                {{ __('Users') }}
                            </p>
                            <p class="text-lg font-bold text-zinc700 dark:text-zinc300">
                                {{-- {{ $users_data }} --}}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="px-4">
                <div class="relative flex flex-col min-w-0 break-words bg-slate-50 dark:bg-dark-bg p-4 rounded mb-6 shadow-lg">
                    {{-- @livewire('admin.dashboard') --}}
                </div>
            </div>
        </div>
    </div>

@endsection

@push('scripts')
    <script>
        document.querySelectorAll('.js-date').forEach(el => {
            el.addEventListener('click', event => {
                clearActive();
                hideAll();
                el.classList.add('active');
                document.querySelector(`#${el.dataset.date}`).style.display = 'flex';
            });
        });

        const clearActive = () => {
            document.querySelectorAll('.js-date').forEach(el => {
                el.classList.remove('active');
            });
        };

        const hideAll = () => {
            document.querySelectorAll('.js-date-row').forEach(el => {
                el.style.display = 'none';
            });
        };
    </script>
@endpush
