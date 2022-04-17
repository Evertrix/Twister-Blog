{{--NOt in use--}}
<x-layout>
    <section class="px-6 py-20">
        <main class="max-w-lg mx-auto mt-20 bg-gray-100 border
        border-gray-200 p-6 rounded-xl">
            <h1 class="text-center font-bold text-xl text-gray-700">Log In!</h1>

            <form action="/login" method="post">
                @csrf

                <div class="mb-6">
{{--                    <label for="email" class="block mb-2 uppercase--}}
{{--                    font-bold text-xs text-gray-700">--}}
{{--                        Email--}}
{{--                    </label>--}}
{{--                    <input type="email"--}}
{{--                           class="border border-gray-400 p-2 w-full text-gray-700"--}}
{{--                           name="email"--}}
{{--                           id="email"--}}
{{--                           value="{{ old('email') }}"--}}
{{--                           required>--}}
{{--                    @error('email')--}}
{{--                    <p class="text-red-500 text-xs mt-1"> {{ $message }} </p>--}}
{{--                    @enderror--}}
                    <x-form.input name="email" value="{{ old('email') }}"/>
                </div>

                <div class="mb-6">
{{--                    <label for="password" class="block mb-2 uppercase--}}
{{--                    font-bold text-xs text-gray-700">--}}
{{--                        Password--}}
{{--                    </label>--}}
{{--                    <input type="password"--}}
{{--                           class="border border-gray-400 p-2 w-full text-gray-700"--}}
{{--                           name="password"--}}
{{--                           id="password"--}}
{{--                           value="{{ old('password') }}"--}}
{{--                           required>--}}
{{--                    @error('password')--}}
{{--                    <p class="text-red-500 text-xs mt-1"> {{ $message }} </p>--}}
{{--                    @enderror--}}
                    <x-form.input name="password" value="{{ old('password') }}"/>
                </div>

                <div class="mb-6">
                    <button type="submit"
                            class="bg-blue-400 text-white rounded py-2 px-4
                            hover:bg-blue-500">
                        Login
                    </button>
                </div>


                {{--                if there are any errors, then show them with the foreach--}}
                @if($errors->any())
                    <ul>
                        @foreach($errors->all() as $error)
                            <li class="text-red-500 text-xs">{{ $error }}</li>
                        @endforeach
                    </ul>
                @endif
            </form>

        </main>
    </section>
</x-layout>
