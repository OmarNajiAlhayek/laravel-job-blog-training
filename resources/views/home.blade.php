        {{-- Hello {{ auth()->user()->first_name }} {{ auth()->user()->last_name }} --}}


<x-layout>
    <x-slot:title>
        Home
    </x-slot:title>
    <x-slot:heading>
        Home Page
    </x-slot:heading>

    @php
        $user = auth()->user();
    @endphp
    @if (session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
            <strong class="font-bold">Hello {{ $user->full_name }}!</strong>
            <span class="block sm:inline">you'r age is: {{ $user->age }}</span>
        </div>
    @endif
    @if (session('error'))
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
        <strong class="font-bold">Error!</strong>
        <span class="block sm:inline">{{ session('error') }}</span>
    </div>
@endif


    {{-- {{ session('success') }} --}}
    {{-- @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif --}}

    {{-- @session('success')
        <div class="flex flex-col">
            @php
                $user = auth()->user();
            @endphp
            <p>Hello {{ $user->full_name }}</p>
            <p>Your age is: {{ $user->age }}</p>
        </div>
    @endsession --}}





<h1 class="bg-primary hover:bg-primaryhover">TTTTTTTTTTTTTTTTTTTTTTTEEEEEEEEEEEEEEEEESSSSSSSSSSSSSSSSTTTTTTTTTT</h1>

<button class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
    Create
  </button>
  <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
    Delete
  </button>

  <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
    Update
  </button>
</x-layout>
{{-- more than one slot --}}
