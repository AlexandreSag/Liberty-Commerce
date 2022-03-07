<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <img src="image/logoT.png" alt="appoule" class="w-20 h-20 fill-current text-gray-500 logoAppoule" />
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- LastName -->
            <div>
                <x-label for="lastname" :value="__('Lastname')" class="font_title"/>

                <x-input id="lastname" class="block mt-1 w-full title_input" type="text" name="lastname" :value="old('lastname')" required autofocus />
            </div>

             <!-- FirstName -->
             <div>
                <x-label for="firstname" :value="__('Firstname')" class="font_title"/>

                <x-input id="firstname" class="block mt-1 w-full title_input" type="text" name="firstname" :value="old('firstname')" required autofocus />
            </div>
            
            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" :value="__('Email')" class="font_title"/>

                <x-input id="email" class="block mt-1 w-full title_input" type="email" name="email" :value="old('email')" required />
            </div>
            <!--Address -->
            <div class="mt-4">
                <x-label for="address" :value="__('Address')" class="font_title"/>

                <x-input id="address" class="block mt-1 w-full title_input" type="text" name="address" :value="old('address')" required />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" class="font_title"/>

                <x-input id="password" class="block mt-1 w-full title_input"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('Confirm Password')" class="font_title"/>

                <x-input id="password_confirmation" class="block mt-1 w-full title_input"
                                type="password"
                                name="password_confirmation" required />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="ml-4 submit">
                    {{ __('Register') }}<i class="fas fa-sign-in-alt"></i>
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
