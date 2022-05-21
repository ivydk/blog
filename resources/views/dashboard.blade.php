<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <p class="text-xl">Hello {{ auth()->user()->name }}!</p>
                    <p> You are logged in as an
                    @if(auth()->user()->role === 'admin')
                    admin.
                    @else
                    user.
                    @endif
                    </p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
