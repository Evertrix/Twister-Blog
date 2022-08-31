<x-layout>
    <section class="px-6 py-8">
        <main class="max-w-6xl mx-auto mt-10 lg:mt-20 space-y-6">
            <article class="max-w-4xl mx-auto lg:grid lg:grid-cols-12 gap-x-10">
                <div class="col-span-4 lg:text-center lg:pt-14 mb-10">

                    <p class="mt-4 block text-gray-400 text-xs">
                        Published
                        <time>{{ $post->created_at->diffForHumans() }}</time>
                    </p>

                    <div class="flex items-center lg:justify-center text-sm mt-4">
                        <img src="{{ asset('storage/images/'.$post->image) }}"
                             alt="{{ asset('storage/images/'.$post->image) }}">
                    </div>
                </div>

                <div class="col-span-8">
                    <div class="hidden lg:flex justify-between mb-6">
                        <a href="/"
                           class="transition-colors duration-300 relative inline-flex items-center text-lg hover:text-blue-500">
                            <svg width="22" height="22" viewBox="0 0 22 22" class="mr-2">
                                <g fill="none" fill-rule="evenodd">
                                    <path stroke="#000" stroke-opacity=".012" stroke-width=".5" d="M21 1v20.16H.84V1z">
                                    </path>
                                    <path class="fill-current"
                                          d="M13.854 7.224l-3.847 3.856 3.847 3.856-1.184 1.184-5.04-5.04 5.04-5.04z">
                                    </path>
                                </g>
                            </svg>

                            Back to Posts
                        </a>
                    </div>


                    <div class="font-bold text-3xl lg:text-4xl mb-10">
                        Category: <a href="/category/{{ $post->category->slug }}"> {{ $post->category->name }} </a>
                    </div>
                    <div class="font-bold text-3xl lg:text-4xl mb-10">
                        Author: <a href="/user/{{ $post->user->username }}"> {{ $post->user->name }} </a>
                    </div>
                    <h1 class="font-bold text-3xl lg:text-4xl mb-10">
                        {{ $post->title }}
                    </h1>

                    <div class="space-y-4 lg:text-lg leading-loose">
                        <article> {!! $post->body !!} </article>
                    </div>
                </div>
            </article>

            @auth
                @if(Auth::user()->id == $post->user_id)
                    <a href="/posts/{{ $post->slug }}/edit">
                        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            Edit
                        </button>
                    </a>

                    <form action="" method="post" class="d-inline">
                        {{ csrf_field() }}
                        @method('DELETE')
                        <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded"
                                type="submit">
                            Delete
                        </button>
                    </form>
                @endif
            @endauth

{{--             Comment Section--}}
{{--            <section class="col-span-8 col-start-5 mt-10 space-y-6">--}}

{{--                'panel' is a style blade component for adding styles to whatever it wraps in it--}}
{{--                Main form for creating comments--}}
                @include('comment._add-comment-form')
            @include('components.replies', ['comments' => $post->comments, 'post_id' => $post->id])
{{--                Loop for returning all the existing comments from the db--}}
{{--                @foreach($post->comments->take(1) as $comment)--}}
{{--                    <div class="display-comment" @if($comment->parent_id != null) style="margin-left:40px;" @endif>--}}
{{--                                                Main Comment Section--}}
{{--                        <article--}}
{{--                            class="flex bg-{{ "toggle" === "1" ? 'gray' : 'white' }}-100 border border-gray-200 p-6 rounded-xl space-x-4">--}}

{{--                            <div class="flex-shrink-0">--}}
{{--                                <img src="@if($comment->user->profile_image == null) {{asset('/storage/avatar/default_avatar.png')}} @else {{asset('/storage/profile_image/'.$comment->user->profile_image)}} @endif" style="--}}
{{--                        width: 60px;--}}
{{--                        height: 60px;--}}
{{--                        background-size: cover;--}}
{{--                        background-position: top center;--}}
{{--                        border-radius: 50%;--}}
{{--                        " alt="Avatar">--}}
{{--                            </div>--}}
{{--                            @if($comment->user->profile_image == null) {{asset('/storage/avatar/default_avatar.png')}} @else {{asset('/storage/profile_image/'.$comment->user->profile_image)}} @endif--}}

{{--                            Body of the comment - Author of the comment, date of post, body--}}
{{--                            <div @if($comment->parent_id != null) style="margin-left:40px;" @endif>--}}
{{--                                <header class="mb-4">--}}
{{--                                    <h3 class="font-bold">{{ $comment->user->name }}</h3>--}}
{{--                                    <p class="time-xs">Posted--}}
{{--                                        <time>{{ $comment->created_at }}</time>--}}
{{--                                    </p>--}}
{{--                                </header>--}}
{{--                                <article> {!! $comment->body !!} </article>--}}

{{--                                Toggle function for creating a reply to a comment--}}
{{--                                <div x-data="{ show: false }">--}}
{{--                                    <button @click="show = !show" :aria-expanded="show ? 'true' : 'false'"--}}
{{--                                            :class="{ 'active': show }">--}}
{{--                                        Toggle Show--}}
{{--                                    </button>--}}

{{--                                    <div x-show="show">--}}

{{--                                        <a href="" id="reply"></a>--}}
{{--                                        Form for the Reply Comment function--}}
{{--                                        <form method="post" action="{{ route('comments.store') }}">--}}
{{--                                            @csrf--}}
{{--                                            <div class="form-group">--}}
{{--                                                <x-form.textarea name="body"/>--}}
{{--                                                <input type="hidden" name="post_id" value="{{ $comment->post_id }}"/>--}}
{{--                                                <input type="hidden" name="parent_id" value="{{ $comment->id }}"/>--}}
{{--                                            </div>--}}
{{--                                            <div class="form-group">--}}
{{--                                                <x-submit-button>Reply</x-submit-button>--}}
{{--                                            </div>--}}
{{--                                            <hr/>--}}
{{--                                        </form>--}}
{{--                                    </div>--}}


{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </article>--}}

{{--                    </div>--}}
{{--                    Replies of a specific comment--}}
{{--                    <div class="ml-20">--}}
{{--                            @include('components.replies', ['comments' => $comment->replies->take(1)])--}}

{{--                        <div x-data="{ show: false }">--}}
{{--                            <button @click="show = !show" :aria-expanded="show ? 'true' : 'false'"--}}
{{--                                    :class="{ 'active': show }">--}}
{{--                                Show Replies--}}
{{--                            </button>--}}

{{--                            <div x-show="show">--}}
{{--                                @include('components.replies', ['comments' => $comment->replies->take(1)])--}}
{{--                            </div>--}}
{{--                        </div>--}}


{{--                    </div>--}}
{{--                    @endif--}}
{{--                @endforeach--}}

{{--                @if($comment->count() > 2 && !empty($comment))--}}
{{--                    @if(!empty($comment))--}}
{{--                    <div x-data="{ show: false }">--}}
{{--                        <button @click="show = !show" :aria-expanded="show ? 'true' : 'false'"--}}
{{--                                :class="{ 'active': show }">--}}
{{--                            Load More--}}
{{--                        </button>--}}
{{--                        @endif--}}

{{--                        <div x-show="show">--}}

{{--                            @foreach($post->comments->skip(1) as $comment)--}}
{{--                                <div class="display-comment">--}}
{{--                                                            Main Comment Section--}}
{{--                                                            <strong>{{ $comment->user->name }}</strong>--}}
{{--                                    <article--}}
{{--                                        class="flex bg-{{ "toggle" === "1" ? 'gray' : 'white' }}-100 border border-gray-200 p-6 rounded-xl space-x-4">--}}

{{--                                        <div class="flex-shrink-0">--}}
{{--                                            <img src="@if($comment->user->profile_image == null) {{asset('/storage/avatar/default_avatar.png')}} @else {{asset('/storage/profile_image/'.$comment->user->profile_image)}} @endif" style="--}}
{{--                        width: 60px;--}}
{{--                        height: 60px;--}}
{{--                        background-size: cover;--}}
{{--                        background-position: top center;--}}
{{--                        border-radius: 50%;--}}
{{--                        " alt="Avatar">--}}
{{--                                        </div>--}}

{{--                                        Body of the comment - Author of the comment, date of post, body--}}
{{--                                        <div>--}}
{{--                                            <header class="mb-4">--}}
{{--                                                <h3 class="font-bold">{{ $comment->user->name }}</h3>--}}
{{--                                                <p class="time-xs">Posted--}}
{{--                                                    <time>{{ $comment->created_at }}</time>--}}
{{--                                                </p>--}}
{{--                                            </header>--}}
{{--                                            <article> {!! $comment->body !!} </article>--}}

{{--                                                                            Toggle function for creating a reply to a comment--}}
{{--                                            <div x-data="{ show: false }">--}}
{{--                                                <button @click="show = !show" :aria-expanded="show ? 'true' : 'false'"--}}
{{--                                                        :class="{ 'active': show }">--}}
{{--                                                    Toggle Show--}}
{{--                                                </button>--}}

{{--                                                <div x-show="show">--}}

{{--                                                    <a href="" id="reply"></a>--}}
{{--                                                                                            Form for the Reply Comment function--}}
{{--                                                    <form method="post" action="{{ route('comments.store') }}">--}}
{{--                                                        @csrf--}}
{{--                                                        <div class="form-group">--}}
{{--                                                            <x-form.textarea name="body"/>--}}
{{--                                                            <input type="hidden" name="post_id" value="{{ $comment->post_id }}"/>--}}
{{--                                                            <input type="hidden" name="parent_id" value="{{ $comment->id }}"/>--}}
{{--                                                        </div>--}}
{{--                                                        <div class="form-group">--}}
{{--                                                            <x-submit-button>Reply</x-submit-button>--}}
{{--                                                        </div>--}}
{{--                                                        <hr/>--}}
{{--                                                    </form>--}}
{{--                                                </div>--}}


{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </article>--}}

{{--                                </div>--}}

{{--                                <div class="ml-20">--}}
{{--                                        @include('components.replies', ['comments' => $comment->replies])--}}

{{--                                    <div x-data="{ show: false }">--}}
{{--                                        <button @click="show = !show" :aria-expanded="show ? 'true' : 'false'"--}}
{{--                                                :class="{ 'active': show }">--}}
{{--                                            Show Replies--}}
{{--                                        </button>--}}

{{--                                        <div x-show="show">--}}
{{--                                            @include('components.replies', ['comments' => $comment->replies])--}}
{{--                                        </div>--}}
{{--                                    </div>--}}

{{--                                </div>--}}
{{--                            @endforeach--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                @endif--}}


{{--            </section>--}}

        </main>

    </section>
</x-layout>
