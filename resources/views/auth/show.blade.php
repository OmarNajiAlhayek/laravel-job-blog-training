<x-layout>
    <x-slot:title>
        {{ 'My Profile' }}
    </x-slot:title>
    <x-slot:heading>
        My Profile
    </x-slot:heading>

@php
    $user = auth()->user();
@endphp


<form method="POST" action="{{ route('registers.update') }}" id="update-form">
    @csrf
    @method('PUT')
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
                  value="{{ $user->first_name }}"
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
                 value="{{ $user->last_name }}"
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
                 value="{{ $user->email }}"
                 placeholder="example@gmail.com"
                   />
                   <x-form-error name="email"></x-form-error>
              </div>
              </x-form-feild>


            <x-form-feild>
              <x-form-lable for="birthday">Birthday</x-form-lable>
              <div class="mt-2">
                  <x-form-input
                      type="date"
                      name="birthday"
                      id="birthday"
                      value="{{ $user->birthday }}"
                      autocomplete="bday"
                  />
                  <x-form-error name="birthdate"></x-form-error>
              </div>
          </x-form-feild>


          </div>
        </div>

      </div>

    <div class="mt-6 flex items-center justify-between gap-x-6">
      <div class="flex items-center">
        <button form="delete-form" id="delete-btn" class="rounded-md bg-white px-3 py-2 text-sm font-semibold text-red-600 border border-red-600 shadow-sm hover:bg-red-600 hover:text-white focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-red-600">
          Remove Profile
       </button>

      </div>



      <div class="flex item-center gap-x-6">
        <x-btn-link href="{{ route('registers.edit-password') }}">
            Change Password
        </x-btn-link>

          <button onclick="history.back()" type="button" class="text-sm font-semibold leading-6 text-gray-900">
            Cancel
          </button>
          {{--? btn directly to flex not good??? --}}
          <div>
            <button type="submit" id="update-btn" class="rounded-md bg-primary px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-primaryhover focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
              Update
            </button>
          </div>

      </div>

    </div>
  </form>

  <form method="POST" action="{{ route('registers.destroy') }}" id="delete-form" class="hidden">
    @csrf
    @method('DELETE')
  </form>

</x-layout>
<script src="{{ asset('css/delete-alert-message.js') }}"></script>
<script src="{{ asset('css/update-alert-message.js') }}"></script>









{{--
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
            </x-form-feild> --}}
