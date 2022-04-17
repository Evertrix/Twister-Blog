{{--@props(['post'])--}}
<x-layout>
    <section class="info-section bg-white py-20 my-20">
        <div class="container mx-auto flex flex-wrap pt-4 pb-12">
            @foreach($posts as $post)
            @endforeach

            <x-section-title>
                @foreach($posts as $post)
                    @if ($loop->first)
                        Posts for User: {{ $post->user->name }}
                    @endif
                @endforeach
            </x-section-title>

                @if($posts->count())
                    <x-posts :posts="$posts"/>
                @else
                    <p class="text-center m-auto">No posts yet. Please, check back later.</p>
                @endif

        </div>
    </section>
</x-layout>
