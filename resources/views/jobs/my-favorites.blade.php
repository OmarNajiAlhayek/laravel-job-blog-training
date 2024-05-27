    <x-layout context="favorites">

        <x-slot:title>
            My Favorite Jobs
        </x-slot:title>
        <x-slot:heading>
            My Favorite Jobs
        </x-slot:heading>
        <x-jobs-display-for-each :jobs="$jobs " />
    </x-layout>
