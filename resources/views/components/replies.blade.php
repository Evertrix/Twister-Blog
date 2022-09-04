@foreach($comments as $comment)
        <div class="display-comment" @if($comment->parent_id != null) style="margin-left:40px;" @endif>
            <article
                class="flex bg-{{ "toggle" === "1" ? 'gray' : 'white' }}-100 border border-gray-200 p-6 rounded-xl space-x-4">

                <div class="flex-shrink-0">
                    <img src="@if($comment->user->profile_image == null) {{asset('/storage/avatar/default_avatar.png')}} @else {{asset('/storage/profile_image/'.$comment->user->profile_image)}} @endif" style="
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
                        <button @click="show = !show" :aria-expanded="show ? 'true' : 'false'"
                                :class="{ 'active': show }">
                            Toggle Show
                        </button>

                        <div x-show="show">

                            <a href="" id="reply"></a>
                            <form method="post" action="{{ route('reply.store') }}">
                                @csrf
                                <div class="form-group">
                                    <x-form.textarea name="body"/>
                                    <input type="hidden" name="post_id" value="{{ $comment->post_id }}"/>
                                    <input type="hidden" name="parent_id" value="{{ $comment->id }}"/>
                                </div>
                                <div class="form-group">
                                    <x-submit-button>Reply</x-submit-button>
                                </div>
                                <hr/>
                            </form>
                        </div>


                    </div>
                </div>
            </article>

        </div>
        <div class="ml-20">
            <div x-data="{ show: false }">
                <button @click="show = !show" :aria-expanded="show ? 'true' : 'false'"
                        :class="{ 'active': show }">
                    Show Replies
                </button>

                <div x-show="show">
                    @include('components.replies', ['comments' => $comment->replies])
                </div>
            </div>
        </div>
@endforeach
