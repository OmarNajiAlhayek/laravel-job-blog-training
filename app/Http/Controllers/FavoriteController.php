<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

class FavoriteController extends Controller
{

    public function index()
    {
        return view('jobs.my-favorites', [
            'jobs' => auth()->user()->favoriteJobListings()->with('user')->get(),
        ]);
    }


    public function store(Job $job)
    {
        auth()->user()->favoriteJobListings()->attach($job);
        $job->number_of_favorites++;
        $job->save();
        return to_route('jobs.show', $job);
    }

    public function destroy(Job $job)
    {
        auth()->user()->favoriteJobListings()->detach($job);
        $job->number_of_favorites--;
        $job->save();
        return to_route('jobs.show', $job);
    }
}
