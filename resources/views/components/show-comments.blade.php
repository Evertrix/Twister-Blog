@props(['comment'])

@foreach($comments as $comment)
    <x-post-comment :comment="$comment"/>
@endforeach

