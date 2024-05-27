@props([
            'context' => 'none',
       ])

<header class="bg-white shadow">
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8 flex justify-between items-center">
        <h1 class="text-3xl font-bold tracking-tight text-gray-900">{{ $slot }}</h1>
        <div class="flex items-center gap-4">

            @if ($context === 'none')
                <x-search-bar :active="request()->routeIs('jobs.index') || request()->routeIs('favorites.index') || request()->routeIs('my-jobs.index')"
                    >
                </x-search-bar>
            @else
                <x-search-bar :active="request()->routeIs('jobs.index') || request()->routeIs('favorites.index') || request()->routeIs('my-jobs.index')"
                    :context="$context">
                </x-search-bar>
            @endif

                <x-btn-link href="{{ route('jobs.create') }}">
                    Create Job
                </x-btn-link>
        </div>
    </div>
</header>
