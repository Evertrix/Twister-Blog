<x-layout>
    <section class="px-6 py-20">
        <main class="max-w-lg mx-auto mt-20 bg-gray-100 border
        border-gray-200 p-6 rounded-xl">
            <h1 class="text-center font-bold text-xl text-gray-700">Log In</h1>

            <form action="/login" method="post">
                @csrf

                <div class="mb-6">
                    <x-form.input name="email" type="email" value="{{ old('email') }}"/>
                </div>

                <div class="mb-6">
                    <x-form.input name="password" type="password" value="{{ old('password') }}"/>
                </div>

                <div class="mb-6">
                    <a class="text-gray-700" href="/forgot-password">Forgotten Password?</a>
                </div>

                <div class="mb-6">
                    <button type="submit"
                            class="bg-blue-400 text-white rounded py-2 px-4
                            hover:bg-blue-500">
                        Login
                    </button>
                </div>


                {{--if there are any errors, then show them with the foreach--}}
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
