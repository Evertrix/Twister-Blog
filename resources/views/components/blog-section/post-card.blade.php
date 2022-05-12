@props(['post'])
<article
    {{ $attributes->merge(['class'=> 'transition-colors duration-300 hover:bg-gray-100 border border-black border-opacity-0 hover:border-opacity-5 rounded-xl']) }}>
    <div class="py-6 px-5">
        <div>
{{--            <img src="/images/illustration-3.png" alt="Blog Post illustration" class="rounded-xl">--}}
            <img src="{{ asset('storage/images/'.$post->image) }}"
                 alt="{{ asset('storage/images/'.$post->image) }}">
        </div>

        <div class="flex-1 flex flex-col justify-between">
            <header class="mt-8 lg:mt-0">
                <div class="space-x-2">
{{--                    <x-category-button :category="$post->category"/>--}}
                </div>

                <div class="mt-4">
                    <h1 class="text-3xl">
                        <a href="/posts/{{ $post->slug }}">{{ $post->title }}</a>
                    </h1>

                    <span class="mt-2 block text-gray-400 text-xs">
                        Published <time>{{ $post->created_at->diffForHumans() }}</time>
                    </span>
                </div>
            </header>

            <div class="text-sm mt-2 space-y-4">
{{--                <p>--}}
                    {!! $post->excerpt !!}
{{--                </p>--}}

{{--                <p class="mt-4">--}}
{{--                    Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.--}}
{{--                </p>--}}
            </div>

            <footer class="flex justify-between items-center mt-8">
                <div class="flex items-center text-sm">
                    <img src="@if($post->user->profile_image === null) {{asset('/storage/avatar/default_avatar.png')}} @else {{asset('/storage/profile_image/'.$post->user->profile_image)}} @endif" alt="avatar"
                         style="width: 60px;
                        height: 60px;
                        background-size: cover;
                        background-position: top center;
                        border-radius: 50%;">
                    <div class="ml-3">
                        <h5 class="font-bold">
                            <a href="/authors/{{$post->user->username}}">{{ $post->user->name }}</a>
                        </h5>
                    </div>
                </div>

                <div class="hidden lg:block">
                    <a href="/posts/{{ $post->slug }}"
                       class="transition-colors duration-300 text-xs font-semibold bg-gray-200 hover:bg-gray-300 rounded-full py-2 px-8"
                    >Read More</a>
                </div>
            </footer>
        </div>
    </div>
</article>