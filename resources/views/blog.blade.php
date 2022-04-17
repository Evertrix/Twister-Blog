<x-layout>
{{--    @include('posts._header')--}}

    <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">
{{--        if we have any post/any items in this collection, then we display them--}}
        @if($posts->count())
            <x-blog-section.posts-grid :posts="$posts"/>

            {{ $posts->links() }}

        @else
            <p class="text-center">No posts yet. Please, check back later.</p>
        @endif
    </main>
</x-layout>
