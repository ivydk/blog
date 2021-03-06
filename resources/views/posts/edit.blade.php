<x-app-layout>
    <!-- The current user can update the post... -->
    <div class="py-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class=" overflow-hidden sm:rounded-lg">
                <div class="p-6  border-gray-200">
                    <h1 class="text-4xl font-semibold">Edit {{ $post->title }}</h1>
                    <x-form :action="route('posts.update', $post)">
                        @csrf
                        @method('PUT')
                        <x-form-input name="user_id" label="user_id" v-on:submit="checkForm" value="{{ \Illuminate\Support\Facades\Auth::user()->id }}" type="hidden"/>
                        <x-form-input name="title" label="Title" v-on:submit="checkForm" value="{{$errors->any() ? old('title') : $post->title }}"/>
                        <x-form-textarea name="excerpt" label="Excerpt" v-on:submit="checkForm" default="{{$errors->any() ? old('excerpt') : $post->excerpt }}"/>
                        <x-form-textarea name="body" label="Body" v-on:submit="checkForm" default="{{$errors->any() ? old('body') : $post->body }}"/>
                        <x-form-submit />
                    </x-form>
                </div>
            </div>
        </div>
</x-app-layout>
