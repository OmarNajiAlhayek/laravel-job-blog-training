
<x-layout>
    <x-slot:title>
        {{ 'Log In' }}
    </x-slot:title>
    <x-slot:heading>
        Log In
    </x-slot:heading>

<form method="POST" action="{{ route('auth.login.store') }}">
    @csrf
    <div class="space-y-12">
      <div class="border-b border-gray-900/10 pb-12">

        <div class="grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
          

          

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
            
        
        </div>
      </div>

    </div>
    <div class="mt-6 flex items-center justify-end gap-x-6">
    {{-- ancor to home? --}}
      <button onclick="history.back()" type="button" class="text-sm font-semibold leading-6 text-gray-900">
        Cancel
      </button>
      <x-form-submit-btn>
        Log In
      </x-form-submit-btn>
    </div>
  </form>
  

</x-layout>