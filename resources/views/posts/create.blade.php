<x-app-layout>
    <div class="py-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class=" overflow-hidden sm:rounded-lg">
                <div class="p-6  border-gray-200">
                    <h1 class="text-4xl font-semibold">Create new post</h1>
                    <x-form :action="route('posts.store')">
                        <x-form-input name="title" label="Title" v-on:submit="checkForm"/>
                        <x-form-textarea name="excerpt" label="Excerpt" v-on:submit="checkForm" />
                        <x-form-textarea name="body" label="Body" v-on:submit="checkForm"/>
                        <x-form-input name="user_id" label="user_id" v-on:submit="checkForm" value="{{ Auth::user()->id}}" type="hidden"/>
                        <x-form-submit />
                    </x-form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
