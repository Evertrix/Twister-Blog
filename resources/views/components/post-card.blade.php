@props(['posts', 'users'])
{{--<body class="antialiased bg-gray-200 text-gray-900 font-sans p-6">--}}
<div class="container mx-auto text-gray-900">
    <div class="flex flex-wrap sm:mx-2">
        @foreach($posts as $post)
        <div class="sm:w-1/2 md:w-1/2 xl:w-1/4 p-4">
            <a href="/posts/{{ $post->slug }}" class="c-card block bg-gray-300 shadow-md hover:shadow-xl rounded-lg overflow-hidden">
                <div class="relative overflow-hidden">
{{--                    <img class="absolute inset-0 h-full w-full object-cover" src="https://images.unsplash.com/photo-1475855581690-80accde3ae2b?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=750&q=80" alt="">--}}
                    <img class="w-full h-full" style="width: 384px; height: 216px;" src="{{ asset('storage/images/'.$post->image) }}" alt="{{ asset('storage/images/'.$post->image) }}">
                </div>
                <div class="p-4">

                    <div class="row px-3">
                        <div class="flex-column">

                            <img class="inline object-cover w-16 h-16 mr-2 rounded-full" src="@if($post->user->profile_image == null) {{asset('/storage/avatar/default_avatar.png')}} @else {{asset('/storage/profile_image/'.$post->user->profile_image)}} @endif" alt="Profile image"/>
                            <h3 class="inline object-cover w-16 h-16 mr-2">{{ $post->user->name }}</h3>
                        </div>
                    </div>
                    <h2 class="mt-2 mb-2  font-bold">{{ Str::limit($post->title, 30) }}</h2>
{{--                    <p class="text-sm">--}}
                    <p class="[toggle === '1' ? 'text-white-700' : 'text-gray-700'] text-base">
                        {!! Str::limit($post->excerpt, 15) !!}
                    </p>
{{--                    </p>--}}
                </div>
            </a>
        </div>







        @endforeach
    </div>
</div>
{{--</body>--}}
