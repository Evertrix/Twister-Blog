{{--NOt in use--}}
<x-layout>
    <section class="px-6 py-20">
        <main class="max-w-lg mx-auto mt-20 bg-gray-100 border
        border-gray-200 p-6 rounded-xl">
            <h1 class="text-center font-bold text-xl text-gray-700">Log In!</h1>
            <form action="/change/{{ auth()->user()->username }}/password" method="post" class="needs-validation"
                  novalidate enctype="multipart/form-data">
                @csrf
                <div class="mb-6">
                    <label for="current_password" class="block mb-2 uppercase
                    font-bold text-xs text-gray-700">
                        Current Password
                    </label>
                    <input type="password"
                           class="border border-gray-400 p-2 w-full text-gray-700"
                           name="current_password"
                           id="current_password">

                    {{-- The value is coming from the input's name attribute--}}
                    @error('current_password')
                    <p class="text-red-500 text-xs mt-1"> {{ $message }} </p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="password" class="block mb-2 uppercase
                    font-bold text-xs text-gray-700">
                        New Password
                    </label>
                    <input type="password"
                           class="border border-gray-400 p-2 w-full text-gray-700"
                           name="password"
                           id="password">

                    {{-- The value is coming from the input's name attribute--}}
                    @error('password')
                    <p class="text-red-500 text-xs mt-1"> {{ $message }} </p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="confirm_password" class="block mb-2 uppercase
                    font-bold text-xs text-gray-700">
                        Confirm New Password
                    </label>
                    <input type="password"
                           class="border border-gray-400 p-2 w-full text-gray-700"
                           name="confirm_password"
                           id="confirm_password">

                    {{-- The value is coming from the input's name attribute--}}
                    @error('confirm_password')
                    <p class="text-red-500 text-xs mt-1"> {{ $message }} </p>
                    @enderror
                </div>

                <div class="d-flex justify-content-first mt-4 ml-2">
                    <button type="submit" class="btn btn-primary"
                            id="formSubmit">change password</button>


            </form>
        </main>
    </section>
</x-layout>
