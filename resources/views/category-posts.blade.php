{{--@props(['posts'])--}}
<x-layout>
    <section class="info-section bg-white py-20 my-20">
        <div class="container mx-auto flex flex-wrap pt-4 pb-12">

            <x-section-title>
            @foreach($posts as $post)
                @if ($loop->first)
                    Posts for category: {{ $post->category->name }}
                @endif
            @endforeach
            </x-section-title>

                @if($posts->count())
                    <x-posts :posts="$posts">
                    </x-posts>
                @else
                    <p class="text-center m-auto">No posts yet. Please, check back later.</p>
                @endif
        </div>
    </section>
</x-layout>
