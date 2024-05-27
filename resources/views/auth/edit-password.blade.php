<x-layout>
    <x-slot:title>
        {{ 'Edit Password' }}
    </x-slot:title>
    <x-slot:heading>
        Edit Password
    </x-slot:heading>

@php
    $user = auth()->user();
@endphp


<form method="POST" action="{{ route('check-old-password') }}" id="update-form">
    @csrf
    <div class="space-y-12">
        <div class="border-b border-gray-900/10 pb-12">

          <div class="grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">



            <x-form-feild>
                <x-form-lable for="old-password">Enter Your Old Password</x-form-lable>
                <div class="mt-2">
                  <x-form-input
                    name="old-password"
                    id="old-password"
                    type="password"
                   />
                     <x-form-error name="old-password"></x-form-error>
                </div>
                </x-form-feild>


            <x-form-feild>
                <x-form-lable for="new-password">Enter New Password</x-form-lable>
                <div class="mt-2">
                  <x-form-input
                    name="new-password"
                    id="new-password"
                    type="password"
                   />
                     <x-form-error name="new-password"></x-form-error>
                </div>
                </x-form-feild>



          </div>
        </div>

      </div>

    <div class="mt-6 flex items-center justify-between gap-x-6">




      <div class="flex item-center gap-x-6">

          <div>
            <button type="submit" id="update-btn" class="rounded-md bg-primary px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-primaryhover focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
              Send
            </button>
          </div>

      </div>

    </div>
  </form>

</x-layout>





