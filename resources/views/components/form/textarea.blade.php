@props(['name', 'title' => 'article', 'value' => old($name)])

{{--<div class="w-full px-3">--}}
    <label class="block uppercase tracking-wide [toggle === '1' ? 'text-white-700' : 'text-gray-700'] text-xs font-bold mb-2"
           for="grid-password">
        {{ ucwords($title) }}
    </label>
    <textarea rows="10"
              class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" name="{{ $name }}">{{ $value }}</textarea>
    <x-form.error name="{{ $name }}"/>
{{--</div>--}}
