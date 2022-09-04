@auth
{{--    Blade file for creating comment form--}}
    <div class='p-0 rounded-xl bg-{{ "toggle" === "1" ? 'gray' : 'white' }}-100'>
        <x-panel>
            <form action="{{route('comments.store')}}" method="POST">
                @csrf
                <header class="flex items-center">
                    <img src="@if(Auth::user()->profile_image === null) {{asset('/storage/avatar/default_avatar.png')}} @else {{asset('/storage/profile_image/'.Auth::user()->profile_image)}} @endif" style="
                        width: 60px;
                        height: 60px;
                        background-size: cover;
                        background-position: top center;
                        border-radius: 50%;
                        " alt="Avatar">
                    <h2 class="ml-4 text-{{ "toggle" === "1" ? 'gray' : 'white' }}-700">
                        Want to participate?
                    </h2>
                </header>

                <div class="mt-6">
                    <x-form.ckeditor name="body"/>
                    <input type="hidden" name="post_id" value="{{ $post->id }}"/>

                    @error('body')
                    <span class="text-xs text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <div class="flex justify-end mt-6 pt-6 border-t border-gray-200">
                    <x-submit-button>Post</x-submit-button>
                </div>
            </form>
        </x-panel>
    </div>
@else
    <p>
        <a href="/login" target="_blank">Log in to leave a comment!</a>
    </p>
@endauth
