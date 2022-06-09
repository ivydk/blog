<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="flex flex-row">
                        <div class="pr-8"><img id="avatar-profile-page"
                                               src="{{asset('/storage/avatars/' . $user->avatar)}}"
                                               alt="avatar"></div>
                        <div>
                            <table>
                                <tr>
                                    <td class="profile-table-first-row"> Name:</td>
                                    <td> {{ $user->name }} </td>
                                </tr>
                                <tr>
                                    <td class="profile-table-first-row"> E-mail:</td>
                                    <td> {{ $user->email }} </td>
                                </tr>
                                <tr>
                                    <td class="profile-table-first-row"> Role:</td>
                                    <td> {{ $user->role }} </td>
                                </tr>
                            </table>
                        </div>
                    </div>

                    <div class="w-full md:w-96 mt-6">
                        <div class="p-6 border border-gray-300 sm:rounded-md">
                            <form
                                method="POST"
                                action="{{ route('profile') }}"
                                enctype="multipart/form-data"
                            >
                                @csrf
                                <x-label class="block mb-6">
                                    <span class="text-gray-700 text-xl">Upload your new avatar</span>
                                    <input
                                        required
                                        name="avatar"
                                        type="file"
                                        class="block-full mt-1 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"/>
                                </x-label>
                                <div class="flex items-center justify-start mt-4">
                                    <x-button
                                        class="text-white bg-gray-900 hover:bg-gray-800 focus:outline-none focus:ring-4 focus:ring-cyan-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-gray-800 dark:hover:bg-cyan-400 dark:focus:ring-cyan-700 dark:border-cyan-700">
                                        {{ __('Change avatar') }}
                                    </x-button>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
