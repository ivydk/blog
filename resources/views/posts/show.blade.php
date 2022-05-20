<x-app-layout>
        <div class="py-2">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class=" overflow-hidden sm:rounded-lg">
                        <div class="p-6  border-gray-200">
                            <h1 class="text-8xl font-semibold">{{ $post->title }}</h1>
                            <p class="text-l"> {{ $post->user->name }} - {{ $post->created_at }}</p>
                            <p class="text-xl font-semibold pt-4"> {{ $post->excerpt }}</p>
                            <p class="pt-3"> {{ $post->body }}</p>

                            {{--  If user made this post ther will be a edit button  --}}
                            @can('update', $post)
                                <a href="{{ route('posts.edit', $post) }}"><button type="button" class="text-white bg-gray-900 hover:bg-gray-800 focus:outline-none focus:ring-4 focus:ring-cyan-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-gray-800 dark:hover:bg-cyan-400 dark:focus:ring-cyan-700 dark:border-cyan-700 mt-6">Edit</button></a>
                            @endcan
                        </div>
                    </div>
            </div>
        </div>
</x-app-layout>
