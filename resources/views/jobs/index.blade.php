{{--
                        ! N + 1 Problem, eager loading id MUCH bitter.
                        ? Instade of going to the database for each employer
                        ? we only go to the data base for one time.
                          select * from employers
                          where id = {$job['employer_id']}
--}}

{{-- if you type
    <head>
        something
    </head>
    here then it will override the original head
    search how to put thing in one .blade file --}}

<x-layout context="all">

    <x-slot:title>
        Jobs
    </x-slot:title>

    <x-slot:heading>
        Jobs Page
    </x-slot:heading>
    @if (isset($is_not_search) && $is_not_search === true)
        <h1 class="my-6 mx-1">Number of jobs is: {{ $jobs_number }}</h1>
        <h1 class="my-6 mx-1">Number of emplyers is: {{ $users_number }}</h1>
    @endif


    <x-jobs-display-for-each :jobs="$jobs" >
        @if(isset($is_paginate) && $is_paginate === true)
            <div>
                {{ $jobs->links() }}
            </div>
        @endif
    </x-jobs-display-for-each>
</x-layout>
