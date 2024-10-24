<x-guest-layout>
  <form method="POST" action="{{ route('nouveau') }}">
      @csrf

      <!-- Immatriculation -->
      <div>
          <x-input-label for="immatricule" :value="__('Immatriculation')" />
          <x-text-input id="immatricule" class="block mt-1 w-full" type="text" name="immatricule" :value="old('immatricule')" required autofocus autocomplete="immatriculation" />
          <x-input-error :messages="$errors->get('immatricule')" class="mt-2" />
      </div>

      <!-- Name -->
      <div>
          <x-input-label for="name" :value="__('Nom')" />
          <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
          <x-input-error :messages="$errors->get('name')" class="mt-2" />
      </div>

      <!-- Email Address -->
      <div class="mt-4">
          <x-input-label for="email" :value="__('Email')" />
          <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="email" />
          <x-input-error :messages="$errors->get('email')" class="mt-2" />
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
          <x-input-label for="password_confirmation" :value="__('Confirmation Mot de passe')" />

          <x-text-input id="password_confirmation" class="block mt-1 w-full"
                          type="password"
                          name="password_confirmation" required autocomplete="new-password" />

          <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
      </div>

      <div class="flex items-center justify-end mt-4">

          <x-primary-button class="ms-4">
              {{ __('Ajouter') }}
          </x-primary-button>
      </div>
  </form>
</x-guest-layout>
