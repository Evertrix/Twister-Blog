{{--<x-guest-layout>--}}
{{--    <x-auth-card>--}}
{{--        <x-slot name="logo">--}}
{{--            <a href="/">--}}
{{--                <x-application-logo class="w-20 h-20 fill-current text-gray-500"/>--}}
{{--            </a>--}}
{{--        </x-slot>--}}

{{--        <!-- Validation Errors -->--}}
{{--        <x-auth-validation-errors class="mb-4" :errors="$errors"/>--}}

{{--        <form method="POST" action="{{ route('register') }}">--}}
{{--        @csrf--}}

{{--        <!-- Name -->--}}
{{--            <div>--}}
{{--                <x-label for="name" :value="__('Name')"/>--}}

{{--                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required--}}
{{--                         autofocus/>--}}
{{--            </div>--}}

{{--            <!-- Username -->--}}
{{--            <div class="mt-4">--}}
{{--                <x-label for="username" :value="__('Username')"/>--}}

{{--                <x-input id="username" class="block mt-1 w-full" type="text" name="username" :value="old('username')" required--}}
{{--                         autofocus/>--}}
{{--            </div>--}}

{{--            <!-- Email Address -->--}}
{{--            <div class="mt-4">--}}
{{--                <x-label for="email" :value="__('Email')"/>--}}

{{--                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required/>--}}
{{--            </div>--}}

{{--            <!-- Password -->--}}
{{--            <div class="mt-4">--}}
{{--                <x-label for="password" :value="__('Password')"/>--}}

{{--                <x-input id="password" class="block mt-1 w-full"--}}
{{--                         type="password"--}}
{{--                         name="password"--}}
{{--                         required autocomplete="new-password"/>--}}
{{--            </div>--}}

{{--            <!-- Confirm Password -->--}}
{{--            <div class="mt-4">--}}
{{--                <x-label for="password_confirmation" :value="__('Confirm Password')"/>--}}

{{--                <x-input id="password_confirmation" class="block mt-1 w-full"--}}
{{--                         type="password"--}}
{{--                         name="password_confirmation" required/>--}}
{{--            </div>--}}

{{--            <div class="flex items-center justify-end mt-4">--}}
{{--                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">--}}
{{--                    {{ __('Already registered?') }}--}}
{{--                </a>--}}

{{--                <x-button class="ml-4">--}}
{{--                    {{ __('Register') }}--}}
{{--                </x-button>--}}
{{--            </div>--}}
{{--        </form>--}}
{{--    </x-auth-card>--}}
{{--</x-guest-layout>--}}

<x-layout>
    <section class="px-6 py-20">
        <main class="max-w-lg mx-auto mt-20 bg-gray-100 border
        border-gray-200 p-6 rounded-xl">
            <h1 class="text-center font-bold text-xl text-gray-700">Register</h1>
            <form action="/register" method="post">
                @csrf
                <div class="mb-6">
{{--                    <label for="name" class="block mb-2 uppercase--}}
{{--                    font-bold text-xs text-gray-700">--}}
{{--                        Name--}}
{{--                    </label>--}}
{{--                    <input type="text"--}}
{{--                           class="border border-gray-400 p-2 w-full text-gray-700"--}}
{{--                           name="name"--}}
{{--                           id="name"--}}
{{--                           value="{{ old('name') }}"--}}
{{--                           required>--}}

{{--                    --}}{{-- The value is coming from the input's name attribute--}}
{{--                    @error('name')--}}
{{--                    <p class="text-red-500 text-xs mt-1"> {{ $message }} </p>--}}
{{--                    @enderror--}}
                    <x-form.input name="name" type="text" value="{{ old('name') }}"/>
                </div>

                <div class="mb-6">
{{--                    <label for="username" class="block mb-2 uppercase--}}
{{--                    font-bold text-xs text-gray-700">--}}
{{--                        Username--}}
{{--                    </label>--}}
{{--                    <input type="text"--}}
{{--                           class="border border-gray-400 p-2 w-full text-gray-700"--}}
{{--                           name="username"--}}
{{--                           id="username"--}}
{{--                           value="{{ old('username') }}"--}}
{{--                           required>--}}

{{--                    --}}{{-- The value is coming from the input's name attribute--}}
{{--                    @error('username')--}}
{{--                    <p class="text-red-500 text-xs mt-1"> {{ $message }} </p>--}}
{{--                    @enderror--}}
                    <x-form.input name="username" type="text" value="{{ old('username') }}"/>
                </div>

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

                    <x-form.input name="email" type="email" value="{{ old('email') }}"/>
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
                    <x-form.input name="password" type="password" value="{{ old('password') }}"/>
                </div>

                <div class="mb-6">
{{--                    <label for="password_confirmation" class="block mb-2 uppercase--}}
{{--                    font-bold text-xs text-gray-700">--}}
{{--                        Confirm Password--}}
{{--                    </label>--}}
{{--                    <input type="password"--}}
{{--                           class="border border-gray-400 p-2 w-full text-gray-700"--}}
{{--                           name="password_confirmation"--}}
{{--                           id="password_confirmation"--}}
{{--                           value="{{ old('password_confirmation') }}"--}}
{{--                           required>--}}

                    <label class="block uppercase text-gray-700 tracking-wide [toggle === '1' ? 'text-white-700' : 'text-gray-700'] text-xs font-bold mb-2"
                           for="password_confirmation">Confirm Password</label>
                    <input
                        class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                        id="password_confirmation" type="password" name="password_confirmation" placeholder="Confirm Password" required>
                    {{--                        <p class="text-red-500 text-xs italic">Please fill out this field.</p>--}}
                    <x-form.error name="password_confirmation"/>

                </div>

                <div class="mb-6">
                    <button type="submit"
                            class="bg-blue-400 text-white rounded py-2 px-4
                            hover:bg-blue-500">
                        Submit
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

