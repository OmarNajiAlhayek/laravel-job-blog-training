
<x-layout>
    <x-slot:title>
        {{ 'Register' }}
    </x-slot:title>
    <x-slot:heading>
        Register
    </x-slot:heading>
    <a  href="{{ route('login') }}" class="underline text-sm text-gray-500 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
        Already registered?
    </a>
<form method="POST" action="{{ route('auth.register.store') }}">
    @csrf
    <div class="space-y-12">
      <div class="border-b border-gray-900/10 pb-12">

        <div class="grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
          <x-form-feild>
            <x-form-lable for="first_name">First Name</x-form-lable>
            <div class="mt-2">
                <x-form-input
                name="first_name"
                id="first_name"
                autocomplete="first_name"
                value="{{ old('first_name') }}"
                placeholder="Omar"
                 />
                 <x-form-error name="first_name"></x-form-error>
            </div>


          </x-form-feild>

          <x-form-feild>
            <x-form-lable for="last_name">Last Name</x-form-lable>
            <div class="mt-4">
              <x-form-input
               name="last_name"
               id="last_name"
               value="{{ old('last_name') }}"
               placeholder="Naji Alhayek"
                 />
                 <x-form-error name="last_name"></x-form-error>
            </div>
            </x-form-feild>

          <x-form-feild>
            <x-form-lable for="email">Email</x-form-lable>
            <div class="mt-2">
              <x-form-input
               name="email"
               id="email"
               type="email"
               value="{{ old('email') }}"
               placeholder="example@gmail.com"
                 />
                 <x-form-error name="email"></x-form-error>
            </div>
            </x-form-feild>


          <x-form-feild>
            <x-form-lable for="password">Password</x-form-lable>
            <div class="mt-2">
              <x-form-input
               name="password"
               id="password"
               type="password"
                 />
                 <x-form-error name="password"></x-form-error>
            </div>
            </x-form-feild>


          <x-form-feild>
            <x-form-lable for="password_confirmation">Confirm Password</x-form-lable>
            <div class="mt-2">
              <x-form-input
               name="password_confirmation"
               id="password_confirmation"
               type="password"
                 />
                 <x-form-error name="password_confirmation"></x-form-error>
            </div>
          </x-form-feild>


          <x-form-feild>
            <x-form-lable for="birthdate">Birthdate</x-form-lable>
            <div class="mt-2">
                <x-form-input
                    type="date"
                    name="birthday"
                    id="birthday"
                    valud="{{ old('birthday') }}"
                    autocomplete="bday"
                />
                <x-form-error name="birthdate"></x-form-error>
            </div>
        </x-form-feild>


        </div>
      </div>

    </div>
    <div class="mt-6 flex items-center justify-end gap-x-6">
    {{-- ancor to home? --}}
      <button onclick="history.back()" type="button" class="text-sm font-semibold leading-6 text-gray-900">
        Cancel
      </button>
      <x-form-submit-btn>
        Register
      </x-form-submit-btn>
    </div>
  </form>


</x-layout>
