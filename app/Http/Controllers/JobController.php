<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\User;
use App\Models\Comment;
use App\Events\JobCreated;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\StoreJobRequest;
use App\Http\Requests\UpdateJobRequest;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\SearchJobByTitleRequest;

class JobController extends Controller
{
    public function index()
    {
        // $jobs = Job::with('employer')->paginate(3);// paginate will load eavery thing.
        $jobs = Job::with('user')
        ->latest()
        ->simplePaginate(3);// paginate will load eavery thing.
        // $jobs = Job::with('employer')->cursorPaginate(3);// not for public, for company with milions of ...


        return view('jobs.index', compact('jobs'))
               ->with('is_paginate', true)
               ->with('jobs_number', Job::all()->count())
               ->with('users_number', User::all()->count())
               ->with('is_not_search', true);
    }


    public function show(Job $job)
    {
        return view("jobs.show", [
            'job' => $job,
            'comments' => $job->comments()->with('user')->get(),
        ]);
    }


    public function create()
    {
        return view('jobs.create');
    }


    public function store(StoreJobRequest $request)
    {
        $validated = $request->validated();
        //if ($request->hasFile('image'))
        $path = $request->file('image')->store('public/images');

        $job = Job::create([
            'title' => $validated['title'],
            'annual_salary' => $validated['salary'],
            'number_of_favorites' => 0,
            'user_id' => auth()->user()->id,
        ]);

        JobCreated::dispatch($job);


        $job->image()->create([
            'url' => Storage::url($path),
        ]);





        //! $user = User::create($request->validated);
        // Mail::to($user->email)->send(new WelcomeMessage);

        //Alert::success('Success Title', 'Success Message');

        alert()->success('Creation Successful', 'The new job has been created and added to the database.');


        // Redirect to the named route 'jobs'
        //return redirect()->route('jobs');
        return to_route('jobs.index');
    }


    public function edit(Job $job)
    {
        //? 1) inline authorization.
        //? $model->is();
        //? Determine if tow models have the same id
        //? and belongs to the same table.


        //? 2) Gate.
        //? only in edit.
        //? when you are in show.blade.php
        //? the gate at this point does not exists
        // Gate::define('edit-job', function(User $user, Job $job){
        //  return $job
        //         ->employer
        //         ->user
        //         ->is($user);
                 //? abort(403) by default.

        // });

        //? 3) Define Gates at AppServiceProvider

        //? $model->can()
        //? Determine if the entity
        //? has the given abilities.


        if (Auth::guest()) return to_route('auth.login.store');

        //if ($job->employer->user->isNot(Auth::user())) abort(403);

        //! you have to repeat if for every action that you want...,
        //? you have to refrence it for every action.

        //? 4) middleware authorization.

        //! Gate::authorize('edit-job', $job);
        /*
            if (Gate::denies('edit-job', $job)) {
                do what ever you want
            }
            else if (Gate::allows('edit-job', $job)) {
                do what ever you want
            }
        */



        // if (Auth::user()->cannot('edit-job', $job)) {

        // }

        return view("jobs.edit", [
            'job' => $job,//Job::findOrFail($id),
        ]);
    }


    public function update(UpdateJobRequest $request, Job $job)
    {
        //authentication, Validation, authorization, edit, redirect
        $validated = $request->validated();

        if ($this->is_same_job_information($job, $validated)) {
            alert()->error('Update Failed','You didn\'t update any thing.');
            //return to_route('jobs');
            //TODO: redirect to the updated job paginate page.
            return to_route('jobs.show', $job->id);
        }
        //this befor ...
        $job->update([
            'title' => $validated['title'],
            'annual_salary' => $validated['salary'],
        ]);

        alert()->success('Update Successful', 'The job details have been successfully updated in the database.');

        //return to_route('jobs');
        //TODO: redirect to the updated job paginate page.
        return to_route('jobs.show', $job);



    }


    private static function is_same_job_information($old_job, $current_job): bool
    {
        return (
            1 === 1
            && $current_job['title'] === $old_job->title
            && $current_job['salary'] === $old_job->annual_salary
        );
    }


    public function destroy(Job $job)
    {
        // $job = Job::findOrFail($id);
        // $job->delete();
        //Job::findOrFail($id)->delete();
        $job->delete();

        alert()->success('Delete Successful', 'The job have been successfully deleted from the database.');

        return to_route('jobs.index');
    }

public function searchJobByTitle(SearchJobByTitleRequest $request)
{
    if ($request->input('context') === 'none')
        return to_route('jobs.index');

    $validated = $request->validated();

    $query = Job::query();

    if ($validated['context'] === 'my_jobs') {
        $query->where('user_id', auth()->id());
    } elseif ($validated['context'] === 'favorites') {
        $query->whereHas('favoritedByUsers', function ($q) {
            $q->where('user_id', auth()->id());
        });
    }

    $jobs = $query->where('title', 'like', '%' . $validated['search'] . '%')
        ->with('user')
        ->get();


    return view($this->viewResult($validated['context'])
                        ,compact('jobs'));
}


    public function viewResult($context)
    {
        switch($context)
        {
            case 'my_jobs':
                return 'jobs.my-jobs';

            case 'favorites':
                return 'jobs.my-favorites';

            default:
                return 'jobs.index';
        }
    }



    public function myJobsIndex()
    {

        $jobs = Job::with('user')
            ->where('user_id', auth()->user()->id)
            ->latest()
            ->get();

        return view('jobs.my-jobs', compact('jobs'));
    }

}





