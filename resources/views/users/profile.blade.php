<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <div class="flex flex-row">
                        <div class="pr-8"><img id="avatar" src="{{ $user->avatar }}" alt="avatar"></div>
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


                    <form enctype="multipart/form-data" action="{{ route('profile') }}" method="POST">
                        <label>Update Profile Image</label>
                        <input type="file" name="avatar">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="submit" class="pull-right btn btn-sm btn-primary">
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
