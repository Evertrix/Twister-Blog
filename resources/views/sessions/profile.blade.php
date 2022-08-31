<x-layout>
    <section class="px-6 py-20">
        <main class="max-w-lg mx-auto mt-20 bg-gray-100 border
        border-gray-200 p-6 rounded-xl">
            <h1 class="text-center font-bold text-xl text-gray-700">Edit Profile</h1>

            <form action="/profile/{{ auth()->user()->username }}/edit" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-6">
{{--                    <label for="name" class="block mb-2 uppercase--}}
{{--                    font-bold text-xs text-gray-700">--}}
{{--                        Name--}}
{{--                    </label>--}}
{{--                    <input type="text"--}}
{{--                           class="border border-gray-400 p-2 w-full text-gray-700"--}}
{{--                           name="name"--}}
{{--                           id="name"--}}
{{--                           value="{{ auth()->user()->name }}">--}}

{{--                    --}}{{-- The value is coming from the input's name attribute--}}
{{--                    @error('name')--}}
{{--                    <p class="text-red-500 text-xs mt-1"> {{ $message }} </p>--}}
{{--                    @enderror--}}

                    <x-form.input name="name" value="{{ auth()->user()->name }}"/>
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
{{--                           value="{{ auth()->user()->username }}">--}}

{{--                    --}}{{-- The value is coming from the input's name attribute--}}
{{--                    @error('username')--}}
{{--                    <p class="text-red-500 text-xs mt-1"> {{ $message }} </p>--}}
{{--                    @enderror--}}
                    <x-form.input name="username" value="{{ auth()->user()->username }}"/>
                </div>

                <div class="flex flex-wrap -mx mb-6">
                        <input type="file" name="profile_image" class="form-control">
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
{{--                           value="{{ auth()->user()->email }}">--}}
{{--                    @error('email')--}}
{{--                    <p class="text-red-500 text-xs mt-1"> {{ $message }} </p>--}}
{{--                    @enderror--}}
                    <x-form.input name="email" value="{{ auth()->user()->email }}"/>
                </div>

{{--                <div class="mb-6">--}}
{{--                    <label for="password" class="block mb-2 uppercase--}}
{{--                    font-bold text-xs text-gray-700">--}}
{{--                        Password--}}
{{--                    </label>--}}
{{--                    <input type="password"--}}
{{--                           class="border border-gray-400 p-2 w-full text-gray-700"--}}
{{--                           name="password"--}}
{{--                           id="password"--}}
{{--                           value="{{ auth()->user()->password }}">--}}
{{--                    @error('password')--}}
{{--                    <p class="text-red-500 text-xs mt-1"> {{ $message }} </p>--}}
{{--                    @enderror--}}
{{--                </div>--}}

                <div class="mb-6">
                    <button type="submit"
                            class="bg-blue-400 text-white rounded py-2 px-4
                            hover:bg-blue-500">
                        Update
                    </button>
                </div>
{{--                Route::get('resetpassword/{user}', [PasswordResetLinkController::class, 'create'])->middleware('auth')->name('password.email');--}}
                <div class="mb-6">
                    <button type="submit"
                            class="bg-blue-400 text-white rounded py-2 px-4
                            hover:bg-blue-500">
                        <a href="{{ route('password.request')}}">Change Password</a>
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
{{--            <div class="mb-6">--}}
{{--                <button type="submit"--}}
{{--                        class="bg-blue-400 text-white rounded py-2 px-4--}}
{{--                            hover:bg-blue-500">--}}
{{--                    <a href="{{ route('password.reset')}}">Change Password</a>--}}
{{--                </button>--}}
{{--            </div>--}}

        </main>
    </section>
</x-layout>
