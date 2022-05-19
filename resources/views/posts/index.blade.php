<x-app-layout>
    @foreach($posts as $post)

        <div class="py-2">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <a href="">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 bg-white border-b border-gray-200">
                            <h1 class="font-semibold text-lg">{{ $post->title }}</h1>
                            <p> {{ $post->excerpt }}</p>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    @endforeach
</x-app-layout>
