@props(['posts', 'users'])
<section class="info-section bg-white py-10 my-10 sm:ml-36">
    <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-3 gap-10 m-auto">
        @foreach($posts as $post)
            <div class="max-w-sm rounded overflow-hidden shadow-lg inline-block">
                <a href="/posts/{{ $post->slug }}">
                    <img class="w-full h-full" style="width: 384px; height: 216px;"
                         src="{{ asset('storage/images/'.$post->image) }}"
                         alt="{{ asset('storage/images/'.$post->image) }}">
                    <div class="px-6 py-4">
                        <div class="font-bold text-xl mb-2">{{ Str::limit($post->title, 15) }}</div>
                        {{ $post->user->name }}

                        <img
                            src="@if($post->user->profile_image == null) {{asset('/storage/avatar/default_avatar.png')}} @else {{asset('/storage/profile_image/'.$post->user->profile_image)}} @endif"
                            style="
                        width: 60px;
                        height: 60px;
                        background-size: cover;
                        background-position: top center;
                        border-radius: 50%;
                        " alt="Avatar">

                        <p class="[toggle === '1' ? 'text-white-700' : 'text-gray-700'] text-base">
                            {!! Str::limit($post->excerpt, 15) !!}
                        </p>
                    </div>
                    <div class="px-6 pt-4 pb-2">
                        <span
                            class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">#photography</span>
                        <span
                            class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">#travel</span>
                        <span
                            class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">#winter</span>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
</section>
