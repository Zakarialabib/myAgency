<x-guest-layout>
    <section class="hero">
        <img src="{{ asset('uploads/' . $page->image) }}" alt="{{ $page->title }}" class="w-full" />
        <div class="heading-container absolute flex justify-center items-center w-full">
            <h1 class="text-5xl text-white">{{ $page->title }}</h1>
        </div>
        <div class="w-full flex flex-col items-center px-5 py-8 mx-auto  max-w-7xl sm:px-6 lg:px-8">
            <div class="mx-auto text-left">
                <p>{!! $page->content !!}</p>
            </div>
        </div>
    </section>
</x-guest-layout>
