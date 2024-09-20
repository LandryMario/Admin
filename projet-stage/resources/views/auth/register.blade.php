<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Nom')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Adresse e-mail')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>
                  <!-- Province -->
                  <div>
            <x-input-label for="appel" :value="__('Cour d\'appel')" />
            <select id="appel" class="block mt-1 w-full rounded-md border-gray-300" name="appel" placeholder="Sélectionnez une province" required autofocus>
                <option value=""></option>
                <option value="Antananarivo" >Antananarivo</option>
                <option value="Antsiranana">Antsiranana</option>
                <option value="Fianarantsoa">Fianarantsoa</option>
                <option value="Mahajanga">Mahajanga</option>
                <option value="Toamasina">Toamasina</option>
                <option value="Toliara" >Toliara</option>
            </select>
            <x-input-error :messages="$errors->get('appel')" class="mt-2" />
        </div>
         <!-- Tribunal -->
         <div>
            <x-input-label for="tribunal" :value="__('Tribunal')" />
            <x-text-input id="tribunal" class="block mt-1 w-full" type="text" name="tribunal" :value="old('tribunal')" required autofocus autocomplete="tribunal" />
            <x-input-error :messages="$errors->get('tribunal')" class="mt-2" />
        </div>
        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Mot de passe')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirmer le mot de passe')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Déjà enregistré ?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Inscription') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
