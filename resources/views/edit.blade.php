<x-layout>
    <div class="items-center" style="margin:auto">
        <div class="grid-flow-col grid-rows-1 sm:grid-rows-1 sm:grid-cols-2 gap-4 items-center" style="margin:auto; width:75%;">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            <form class="p-20 m-20 items-center" action="/posts/{{$post->slug}}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                @method('PUT')
                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                        <x-form.input name="title" value="{!! $post->title !!}"/>
                    </div>
                    <div class="w-full md:w-1/2 px-3">
                        <x-form.input name="slug" value="{!! $post->slug !!}"/>
                    </div>
                </div>
                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3">
                        <x-form.input name="excerpt" value="{!! $post->excerpt !!}"/>
                    </div>
                </div>

                <div class="flex flex-wrap -mx mb-6">
                    <input type="file" name="image" class="form-control">
{{--                    {{ asset('storage/images/'.$post->image) }}--}}
                    <img class="w-full h-full" style="width: 100px; height: 100px;" src="{{ asset('storage/images/'.$post->image) }}" alt="{{ asset('storage/images/'.$post->image) }}">
                </div>
                    <div class="flex flex-wrap -mx-3 mb-6">

                        <div id="flex flex-wrap -mx-3 mb-6">
                            <x-form.ckeditor name="body" title="article" value="{!! $post->body !!}"/>
                        </div>

                    </div>

                    <button
                        class="shadow bg-indigo-600 hover:bg-indigo-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-6 rounded"
                        type="submit">
                        Update
                    </button>
{{--                </div>--}}
            </form>

        </div>
    </div>
</x-layout>
