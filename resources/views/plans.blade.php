<x-layout>
    <x-content-site>
        <x-slot name="plans_slot">
{{--            @if($posts->count())--}}
{{--                <x-posts :posts="$posts"/>--}}
{{--                <x-post-card :posts="$posts"/>--}}
                <x-subscriptions.plans :plans="$plans"/>
{{--            @else--}}
{{--                <p class="text-center m-auto">No plans yet. Please, check back later.</p>--}}
{{--            @endif--}}
{{--            <div class="flex flex-wrap items-center content-center justify-center justify-items-center sm:mx-auto"--}}
{{--                 style="margin-left: 30%;"--}}
{{--            >{{ $posts->links() }}</div>--}}
        </x-slot>
    </x-content-site>
</x-layout>
