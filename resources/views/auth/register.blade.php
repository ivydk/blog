<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <img src="img/id-logo.png" alt="id-logo" class="w-20 h-20">
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
            <div>
                <x-label for="name" :value="__('Name')"/>

                <x-input id="name"
                         class=" block mt-1 w-full {{ $errors->has('name') ? 'border-red-500' : ''   }}" type="text"
                         name="name" :value="old('name')"
                         autofocus
                         required/>
                @error('name')
                <span class="text-red-500 text-sm" role="alert">! {{ $message }}</span>
                @enderror
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" :value="__('Email')"/>
                <span class="text-gray-500 text-sm">
                    Please use the right format e.g. jsmith@example.com
                </span>
                <x-input id="email"
                         class="block mt-1 w-full {{ $errors->has('email') ? 'border-red-500' : ''   }} "
                         type="email"
                         name="email" :value="old('email')"
                         pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{1,63}$"
                         required
                />

                @error('email')
                <span class="text-red-500 text-sm" role="alert">! {{ $message }}</span>
                @enderror
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')"/>
                <span class="text-gray-500 text-sm">
                    Password must contain at least 8 characters, one lowercase letter, one uppercase letter, one number and one symbol
                </span>
                <x-input id="password"
                         class="block mt-1 w-full {{ $errors->has('password') ? 'border-red-500' : ''   }}"
                         type="password"
                         name="password"
                         autocomplete="new-password"
                         required/>
                @error('password')
                <span class="text-red-500 text-sm" role="alert">! {{$message}}</span>
                @enderror
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('Confirm Password')"/>

                <x-input id="password_confirmation"
                         class="block mt-1 w-full {{ $errors->has('password') ? 'border-red-500' : ''   }}"
                         type="password"
                         name="password_confirmation"
                         required/>
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button
                    class="text-white bg-gray-900 hover:bg-gray-800 focus:outline-none focus:ring-4 focus:ring-cyan-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-gray-800 dark:hover:bg-cyan-400 dark:focus:ring-cyan-700 dark:border-cyan-700 ml-3">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>


