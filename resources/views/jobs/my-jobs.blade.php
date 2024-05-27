
<x-layout context="my_jobs">

    <x-slot:title>
        My Jobs
    </x-slot:title>
    <x-slot:heading>
        My Jobs
    </x-slot:heading>

    <x-jobs-display-for-each :jobs="$jobs" />



</x-layout>
