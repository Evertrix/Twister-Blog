<x-layout>
    <section class="px-6 py-20">
        <main class="max-w-lg mx-auto mt-20 bg-gray-100 border
        border-gray-200 p-6 rounded-xl">
            <h1 class="text-center font-bold text-xl text-gray-700">Edit Profile</h1>

            <form action="/profile/{{ auth()->user()->username }}/edit" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-6">
                    <x-form.input name="name" value="{{ auth()->user()->name }}"/>
                </div>

                <div class="mb-6">
                    <x-form.input name="username" value="{{ auth()->user()->username }}"/>
                </div>

                <div class="flex flex-wrap -mx mb-6">
                        <input type="file" name="profile_image" class="form-control">
                </div>

                <div class="mb-6">
                    <x-form.input name="email" value="{{ auth()->user()->email }}"/>
                </div>
                <div class="mb-6">
                    <button type="submit"
                            class="bg-blue-400 text-white rounded py-2 px-4
                            hover:bg-blue-500">
                        Update
                    </button>
                </div>
                <div class="mb-6">
                    <button type="submit"
                            class="bg-blue-400 text-white rounded py-2 px-4
                            hover:bg-blue-500">
                        <a href="/change/{{ auth()->user()->username }}/password">Change Password</a>
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
