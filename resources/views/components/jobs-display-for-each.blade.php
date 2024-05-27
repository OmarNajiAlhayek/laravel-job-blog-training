@props([
            'jobs' => [],
       ])


<div class="space-y-4">
    @foreach ($jobs as $job)
        <a href="{{ route('jobs.show', $job->id) }}" class="hover:underline block px-4 py-6 border border-gray-200 rounded-lg transform transition duration-300 ease-in-out hover:scale-105 hover:bg-gray-100">
            <div class="font-bold text-blue-500 text-sm">
                {{ $job->user->full_name }}
            </div>
            <div class="flex flex-col">
                <strong>{{ $job->title }}.</strong>

                @php
                    $favoraties = $job->number_of_favorites;
                @endphp
                @if ($favoraties !== 0)
                    Number of favoraites: {{ $favoraties }}
                @endif

            </div>
        </a>
    @endforeach
{{ $slot }}

</div>
