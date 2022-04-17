{{--@props(['comment', 'user'])--}}
<div class='p-0 rounded-xl bg-{{ "toggle" === "1" ? 'gray' : 'white' }}-100'>
    <x-panel>
        <article class="flex space-x-4">
            <div class="flex-shrink-0">
                <img src="{{asset('/storage/profile_image/'.$profile_image)}}" style="
                        width: 60px;
                        height: 60px;
                        background-size: cover;
                        background-position: top center;
                        border-radius: 50%;
                        " alt="Avatar">
                <img
                    src="@if($post->user->profile_image == null) {{asset('/storage/avatar/default_avatar.png')}} @else {{asset('/storage/profile_image/'.$post->user->profile_image)}} @endif"
                    style="
                        width: 60px;
                        height: 60px;
                        background-size: cover;
                        background-position: top center;
                        border-radius: 50%;
                        " alt="Avatar">
            </div>

            <div>
                <header class="mb-4">
                    <h3 class="font-bold">{{ $comment->user->username }}</h3>
                    <p class="text-xs">
                        Posted
                        <time>{{ $comment->created_at->format('F j, Y, g:i a') }}</time>
                    </p>
                </header>
                <article> {!! $comment->body !!} </article>

            </div>

            {{--        Comment Replies form--}}
            <div x-data="{ show: false }">
                <button @click="show = !show" :aria-expanded="show ? 'true' : 'false'" :class="{ 'active': show }">
                    Reply
                </button>

                <h4>Display Comments</h4>
                @include('components.replies', ['comments' => $post->comments, 'post_id' => $post->id])
                <hr/>
                <h4>Add comment</h4>
                <form method="post" action="{{ route('comments.store') }}">
                    @csrf
                    <div class="mt-6">
                        <input type="text" name="body" class="form-control"/>
                        <textarea
                            name="body"
                            style="font-size: 1.1em; padding: 10px; color: black;"
                            class="textarea-panel w-full text-xs focus:outline-none focus:ring bg-{{ "toggle" === "1" ? 'white' : 'gray' }}-100"
                            cols="30"
                            rows="10"
                            placeholder="Quick, think of something to say"
                            required></textarea>
                        <input type="hidden" name="post_id" value="{{ $comment->post_id }}"/>
                        <input type="hidden" name="parent_id" value="{{ $comment->id }}"/>
                    </div>
                    <div class="form-group">
                        <x-submit-button>Reply</x-submit-button>
                    </div>
                    <hr/>
                </form>
            </div>

        </article>
    </x-panel>
</div>
