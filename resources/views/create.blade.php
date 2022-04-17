<x-layout>
    <div class="items-center py-8 mx-auto">
        <div class="grid-flow-col grid-rows-1 sm:grid-rows-1 sm:grid-cols-2 gap-4 items-center" style="margin:auto; width:75%;">

            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            <form class="p-20 m-20 items-center" action="{{ route('post.store') }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full md:w-1/2 px-1 mb-6 md:mb-0">
                        <x-form.input name="title"/>
                    </div>
                    <div class="w-full md:w-1/2 px-0 mb-6 md:mb-0">
                        <x-form.input name="slug"/>
                    </div>
                </div>

                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="relative inline-flex">
                        <svg class="w-2 h-2 absolute top-0 right-0 m-4 pointer-events-none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 412 232"><path d="M206 171.144L42.678 7.822c-9.763-9.763-25.592-9.763-35.355 0-9.763 9.764-9.763 25.592 0 35.355l181 181c4.88 4.882 11.279 7.323 17.677 7.323s12.796-2.441 17.678-7.322l181-181c9.763-9.764 9.763-25.592 0-35.355-9.763-9.763-25.592-9.763-35.355 0L206 171.144z" fill="#648299" fill-rule="nonzero"/></svg>
                        {{--                        Category Section cannot be restructed--}}
                        <select name="category_id" id="category_id" class="border border-gray-300 rounded-full text-gray-600 h-10 pl-5 pr-10 bg-white hover:border-gray-400 focus:outline-none appearance-none">
                            <option>Choose a Category</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ ucwords($category->name) }}</option>
                            @endforeach
                        </select>
                        {{--                        Category Section cannot be restructed--}}
                    </div>
                </div>
                <div class="flex flex-wrap -mx-3 mb-6">
                    <x-form.input name="excerpt" type="text"/>
                </div>

                <div class="flex flex-wrap -mx-3 mb-6">
                    <x-form.input name="image" type="file"/>
                </div>

                <div class="flex flex-wrap -mx-3 mb-6">

                    <div id="flex flex-wrap -mx-3 mb-6">
                        <x-form.ckeditor name="body" title="article"/>
                    </div>

                </div>

                <div id="flex flex-wrap -mx-20 mb-48">
                    <x-form.button name="publish"/>
                </div>

            </form>
        </div>
    </div>

</x-layout>

