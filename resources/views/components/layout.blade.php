@props([
            'context' => 'none',
       ])

<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-100">
<x-layout-head>
    {{$title}}
</x-layout-head>

<body class="h-full">

    <div class="min-h-full">
        <x-nav-bar />

        @if ($context === 'none')
            <x-layout-header >
                {{ $heading }}
            </x-layout-header>
        @else
            <x-layout-header  :context="$context">
                {{ $heading }}
            </x-layout-header>
        @endif

        <main>
            <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
                <!-- Your content -->
                <x-scroll-to-top-btn></x-scroll-to-top-btn>
                {{ $slot }}
            </div>
        </main>
    </div>
    <x-footer></x-footer>
    @include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])

</body>

</html>
