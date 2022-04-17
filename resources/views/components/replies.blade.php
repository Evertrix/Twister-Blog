@foreach($comments as $comment)
    <article
        class="flex bg-{{ "toggle" === "1" ? 'gray' : 'white' }}-100 border border-gray-200 p-6 my-6 rounded-xl space-x-4">
        <div class="flex-shrink-0">
            <img
                src="@if($comment->user->profile_image == null) {{asset('/storage/avatar/default_avatar.png')}} @else {{asset('/storage/profile_image/'.$comment->user->profile_image)}} @endif"
                style="
                        width: 60px;
                        height: 60px;
                        background-size: cover;
                        background-position: top center;
                        border-radius: 50%;
                        " alt="Avatar">
        </div>


        <div @if($comment->parent_id != null) style="margin-left:40px;" @endif>
            <header class="mb-4">
                <h3 class="font-bold">{{ $comment->user->name }}</h3>
                <p class="time-xs">Posted
                    <time>{{ $comment->created_at }}</time>
                </p>
            </header>
            <article> {!! $comment->body !!} </article>


            <div x-data="{ show: false }">
                <button @click="show = !show" :aria-expanded="show ? 'true' : 'false'" :class="{ 'active': show }">
                    Toggle Show
                </button>


                <div x-show="show">

                    <a href="" id="reply"></a>
                    <form method="post" action="{{ route('comments.store') }}">
                        @csrf
                        <div class="form-group">
                        <textarea
                            name="body"
                            style="font-size: 1.1em; padding: 10px; color: black;"
                            class="textarea-panel w-full text-xs focus:outline-none focus:ring bg-{{ "toggle" === "1" ? 'white' : 'gray' }}-100"
                            cols="10"
                            rows="5"
                            placeholder="Quick, think of something to say"
                            required></textarea>
                            <input type="hidden" name="post_id" value="{{ $comment->post_id }}"/>
                            <input type="hidden" name="parent_id" value="{{ $comment->id }}"/>
                        </div>
                        <div class="form-group">
                            <x-submit-button>Post A Reply</x-submit-button>
                        </div>
                        <hr/>
                    </form>
                </div>


            </div>

        </div>
    </article>
    <div class="ml-20">
        @include('components.replies', ['comments' => $comment->replies])
    </div>
@endforeach
