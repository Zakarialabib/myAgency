<div>
    @section('title', $blog?->title)
    @section('meta')
        <meta itemprop="datePublished" content="{{ $blog->created_at }}">
        <meta itemprop="dateModified" content="{{ $blog->updated_at }}">
        <meta itemprop="headline" content="{{ $blog->title }}">
        <meta itemprop="description" content="{{ $blog->meta_description }}">
        <meta itemprop="image" content="{{ asset('images/blog' . $blog->image) }}">
        <meta itemprop="url" content="{{ route('front.blogPage', $blog->slug) }}">
        <meta itemprop="publisher" content="{{ config('app.name') }}">
        {{-- <meta itemprop="inLanguage" content="{{ $blog->language->name }}"> --}}
        <meta itemprop="keywords" content="{{ $blog->meta_keywords }}">
        <meta itemprop="articleSection" content="{{ $blog->category?->title }}">
        <meta itemprop="articleBody" content="{{ $blog->description }}">
        <meta itemprop="thumbnailUrl" content="{{ asset('images/blog' . $blog->image) }}">
        <meta itemprop="thumbnail" content="{{ asset('images/blog' . $blog->image) }}">
        <meta itemprop="mainEntityOfPage" content="{{ route('front.blogPage', $blog->slug) }}">
        <meta itemprop="genre" content="{{ $blog->category?->title }}">
        <meta itemprop="wordCount" content="{{ str_word_count(strip_tags($blog->description)) }}">
    @endsection
    <section class="relative items-center w-full pt-10 mx-auto bg-white">
        <div class="items-center w-full  max-w-7xl mx-auto text-gray-900">
            <article itemscope itemtype="http://schema.org/Article" class="max-w-prose mx-auto py-8">
                <img src="{{ asset('images/blog' . $blog->image) }}" alt="{{ $blog->title }}"
                    class="w-full h-96 object-cover rounded-lg shadow-lg">
                <div class="flex justify-between items-center mt-4">
                    <div class="flex items-center">
                        <div class="ml-2">
                            <p class="text-sm font-semibold text-gray-700">{{ $blog->category?->title }}</p>
                            {{-- <p class="text-xs text-gray-600">{{ $blog->created_at->format('d M Y') }}</p> --}}
                        </div>
                    </div>
                </div>
                <h1 itemprop="headline" class="mt-4 text-3xl font-bold text-gray-900 leading-tight">
                    {{ $blog->title }}
                </h1>
                <div itemprop="articleBody" class="mt-4 text-gray-700 text-lg leading-relaxed">
                    {{ $blog->description }}
                    {{-- @livewire('editorjs', [
                        'editorId' => 'myEditor',
                        'value' => $blog->description,
                        'readOnly' => true,
                    ]) --}}
                </div>

            </article>
        </div>


        @if (count($this->featuredBlogs) > 0)
            <div class="relative py-10 mx-auto px-6 bg-green-50 ">
                <h2
                    class="uppercase mb-6 text-xl xl:text-5xl lg:text-4xl md:text-3xl sm:text-2xl leading-tight font-extrabold text-black cursor-pointer pb-10 text-center">
                    {{ 'Featured Articles' }}
                </h2>
                <div class="grid lg:grid-cols-4 sm-grid-cols-1 gap-4 py-6">
                    @foreach ($this->featuredBlogs as $blog)
                        <div class="bg-white py-6">
                            <div class="flex flex-wrap items-center">
                                <a href="{{ route('front.blogPage', $blog->slug) }}" class="w-full">
                                    <img alt="{{ $blog->title }}" src="{{ asset('images/blog' . $blog->image) }}"
                                        class="shadow-lg rounded max-w-full h-auto align-middle border-none" />
                                </a>
                                <div class="w-full px-4 mx-auto text-center mt-4">
                                    <h3 class="text-3xl mb-2 font-semibold leading-normal">
                                        {{ $blog->title }}
                                    </h3>
                                    <p class="text-lg font-light leading-relaxed mt-4 mb-4 text-gray-700">
                                        {!! $blog->description !!}
                                    </p>
                                    <a href="{{ route('front.blogPage', $blog->slug) }}"
                                        class="bottom-0 block text-center cursor-pointer border-2 border-green-600 py-2 text-sm front-bold text-green-600 transition ease-in-out duration-300 hover:bg-green-800 hover:text-green-100 focus:bg-green-800 font-semibold uppercase">{{ __('Read More') }}</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif
    </section>
</div>
