<x-guest-layout>


    <section>
        <article itemscope itemtype="http://schema.org/Article" class="max-w-prose mx-auto py-8">
            <img src="{{ asset('uploads/' . $post->image) }}" alt="{{ $post->title }}" class="object-cover object-top w-full" />
            <h1 class="mt-6 text-3xl font-bold text-white md:text-5xl">
                {{ $post->title }}
            </h1>
            <h2 class="mt-2 text-sm text-zinc500">{{ $post->created_at }}</h4>
            <p>{!! clean($post->body) !!}</p>
        </article>
    </section>
</x-guest-layout>
