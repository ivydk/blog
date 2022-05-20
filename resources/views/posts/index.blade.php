<x-app-layout>
    @foreach($posts as $post)
        <div class="py-2">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <a href="{{ route('posts.show', $post) }}">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 bg-white border-b border-gray-200 flex justify-between">
                            <div>
                                <h1 class="font-semibold text-lg">{{ $post->title }}</h1>
                                <p> {{ $post->excerpt }}</p>
                            </div>
                            <div>
                                <form method="POST" action="{{route('posts.destroy', $post)}}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-white bg-gray-900 hover:bg-gray-800 focus:outline-none focus:ring-4 focus:ring-cyan-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-gray-800 dark:hover:bg-cyan-400 dark:focus:ring-cyan-700 dark:border-cyan-700">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    @endforeach
</x-app-layout>
