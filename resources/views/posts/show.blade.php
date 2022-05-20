<x-app-layout>
        <div class="py-2">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class=" overflow-hidden sm:rounded-lg">
                        <div class="p-6  border-gray-200">
                            <h1 class="text-8xl font-semibold">{{ $post->title }}</h1>
                            <p class="text-lg font-semibold"> {{ $post->excerpt }}</p>
                            <p class="pt-6"> {{ $post->body }}</p>
                        </div>
                    </div>
            </div>
        </div>
</x-app-layout>
