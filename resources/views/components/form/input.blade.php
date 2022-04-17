@props(['name', 'long_name' => $name, 'type' => 'text', 'value' => old($name)])
{{--<div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">--}}
{{--<x-form.field>--}}

        <label class="block uppercase text-gray-700 tracking-wide [toggle === '1' ? 'text-white-700' : 'text-gray-700'] text-xs font-bold mb-2"
               for="{{ $name }}">
            {{ ucwords($long_name) }}
        </label>
        <input
            class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
            id="{{ $name }}" type="{{ $type }}" placeholder="{{ ucwords($long_name) }}" name="{{$name}}" value="{{ $value }}">
        {{--                        <p class="text-red-500 text-xs italic">Please fill out this field.</p>--}}
        <x-form.error name="{{ $name }}"/>

{{--</x-form.field>--}}
{{--</div>--}}
