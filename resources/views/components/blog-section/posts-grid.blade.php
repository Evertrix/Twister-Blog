@props(['posts'])
@if($posts->onFirstPage())
<x-blog-section.post-featured-card :post="$posts[0]"/>

{{--If the count of posts is grater than 1--}}
@if($posts->count() > 1)
    <div class="lg:grid lg:grid-cols-6">
        {{--Loop but skip the very first one--}}
        @foreach($posts->skip(1) as $post)
            {{--                        $loop i a Laravel variable--}}
            <x-blog-section.post-card
                :post="$post"
                class="{{ $loop->iteration < 3 ? 'col-span-3' : 'col-span-2' }}"/>
            {{--<x-post-card />--}}
        @endforeach
    </div>
@endif

@else
    {{--If the count of posts is grater than 1--}}
    @if($posts->count() > 1)
        <div class="lg:grid lg:grid-cols-6">
            {{--Loop but skip the very first one--}}
            @foreach($posts->skip(1) as $post)
                {{--                        $loop i a Laravel variable--}}
                <x-blog-section.post-card
                    :post="$post"
                    class="{{ $loop->iteration < 3 ? 'col-span-3' : 'col-span-2' }}"/>
                {{--<x-post-card />--}}
            @endforeach
        </div>
    @endif

@endif
