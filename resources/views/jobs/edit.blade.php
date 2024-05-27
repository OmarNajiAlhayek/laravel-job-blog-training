<x-layout>
    <x-slot:title>
        {{ 'Edit job' }}
    </x-slot:title>
    <x-slot:heading>
        Edit job: {{ $job->title }}
    </x-slot:heading>
{{-- @php
    if(!isset($job->salary)){ 
        var_dump($job->salary);
        dd($job->salary);
        
    }
@endphp --}}
{{-- /jobs/{{ $job->id }} --}}
<form method="POST" action="{{ route('jobs.update', $job->id) }}" id="update-form">
    @csrf
    {{--! or PATCH --}}
    @method('PUT') 
    <div class="space-y-12">
      <div class="border-b border-gray-900/10 pb-12">
        
        <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
          <div class="sm:col-span-4">
            <label for="title" class="block text-sm font-medium leading-6 text-gray-900">Title</label>
            <div class="mt-2">
              <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                <input
                 type="text"
                 name="title"
                 id="title"
                 autocomplete="title"
                 value="{{ $job->title }}"
                 class="block flex-1 border-0 bg-transparent py-1.5 px-3 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" placeholder="Shift Leader"
                 required
                 {{-- minlength="3" --}}
                 >

              </div>
            </div>

            
            {{-- class="text-red-500 text-xs italic"> --}}
            @error('title')
                <p class="text-xs text-red-500 font-semibold mt-1">{{ $message }}</p>
            @enderror

          </div>
          <div class="sm:col-span-4">
            <label for="salary" class="block text-sm font-medium leading-6 text-gray-900">Salary</label>
            <div class="mt-2">
              <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                <input
                type="text"
                name="salary"
                id="salary"
                value="{{ $job->annual_salary }}"
                class="block flex-1 border-0 bg-transparent py-1.5 px-3 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" placeholder="$100,000 Per year"
                required
                {{-- minlength="3" --}}
                >
              </div>
            </div>
            {{-- class="text-red-500 text-xs italic"> --}}
            @error('salary')
                <p class="text-xs text-red-500 font-semibold mt-1">{{ $message }}</p>
            @enderror
          </div>
        </div>
        
      </div>

    </div>
    <div class="mt-6 flex items-center justify-between gap-x-6">
      <div class="flex items-center">
        <button form="delete-form" id="delete-btn" class="rounded-md bg-white px-3 py-2 text-sm font-semibold text-red-600 border border-red-600 shadow-sm hover:bg-red-600 hover:text-white focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-red-600">
          Delete
       </button>
      
      </div>

      <div class="flex item-center gap-x-6">
          <a href="/jobs/{{ $job->id }}" type="button" class="text-sm font-semibold leading-6 text-gray-900">
            Cancel
          </a>
          {{--? btn directly to flex not good??? --}}
          <div>
            <button type="submit" id="update-btn" class="rounded-md bg-primary px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-primaryhover focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
              Update
            </button>
          </div>
          
      </div>
      
    </div>
  </form>
  
  <form method="POST" action="{{ route('jobs.destroy', $job->id) }}" id="delete-form" class="hidden">
    {{-- to gurantee that this request is comming from here. --}}
    @csrf 
    @method('DELETE')
  </form>

</x-layout>
<script src="{{ asset('css/delete-alert-message.js') }}"></script>
<script src="{{ asset('css/update-alert-message.js') }}"></script>
