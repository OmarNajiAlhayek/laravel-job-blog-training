
<?php
/*
! 1. route model binding.
! 2. controller, invocable controller is a single action controller.
*/




//! Job::all(); isn't the best practice.
//? $hidden
//? resource
//? $jobs = JobResource::collection(Job::all());
//! Job::with('employer')->get();
//? get() = select *
// you will not need all of this, you will do pagination
//! instead of getting all of the records from the database
//! which might be thousands or millions of records
//? we will get few of them.
//? like when you search about something on google
//? there is millions of results
//? your memory can not handle that
//? but you will get only 20 result or something like that
//? and at the end of the page, there is a pagination
//? to make you capable to looking for the rest of results.
//? على الحقيقة هلق صارت الصفحة لا نهائية بس أنت بتقلو اعرض المزيد من النتائج

//! return view('/jobs', ['jobs' =>  $jobs]);
//! return view('/jobs')->with('jobs', $jobs);
//? when the name of the variable
//? return view('/jobs', compact('jobs'));

//!                 php artisan vendor:publish
//!                 type 15 for pagination
//? Vendor refers to any package that we have pulled in throw composer,
//? and publish mean I want you to publish any relevant assist or routes,
//? or files or views to my application folder so than I can manually control and edit them
//? it's a very common practice.

// $job->title === $job['title'];

// rules
//use App\Http\Resources\JobResource;
// Arr::first($jobs, function($job) use ($id){
//     return $job['id'] === $id;
// });
// Route::get('/test', function() {
//     Arr::
// });
// ! Str:: ?????????????????????????????????

//! You can install api route look for document route


//! Show
// the wild card {job} and the parameter $job need to be identical
//Job I want an actual instance of $job not string
// Route::get('/posts/{post:slug}' it's {post:id} by default, and you can regex here)

/**
 * return home view
 * @return View
 */

 //use Illuminate\Support\Facades\View;
//@return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View

/**
 * Display the list of jobs.
 *
 * @return \Illuminate\Contracts\View\View
 */
//! Index action

//! if there is no ->where('id', '[0-9]+') you have to make the /jobs/create above,
//? /jobs/{expect string first, if not integer second, }
//? because string is more general, integer not, string accepts both
//? numbers and charters, while integers accepts only integers.

//! if following conventions important
//! Create
// Route::get('/jobs/create', [JobController::class, 'create'])
// ->name('create-job');

//! Store

// Route()
//! Edit

  //! Update

  //! Destroy
  //? /jobs/{id}/delete ? only here not in the browser.
  /**
   * contact page
   * @return Illuminate\Routing\Route
   */
  // or return View??
  //! return redirect()->route('profile', ['id' => 1]);
  //! is equals to
  //! return to_route('profile', ['id' => 1]);
  //! or route model binding =>
  //? return to_route('profile', [$user]);

  // Route::get('/less-than-or-equals', function() {

  //      $validated_less_than_or_equals = request()->validate([
  //         'lessThanOrEquals' => 'integer',
  //     ]);

  //     if (!isset($validated['lessThanOrEquals'])) return Job::all();

  //     return Job::select('id', 'title', 'employer_id', 'annual_salary', 'integer_salary_for_testing')
  //            ->where('integer_salary_for_testing', '<=', (int) $validated_less_than_or_equals)
  //            ->get();
  // });

  //! php artisan route:list, for all
  //! php artisan route:list --except-vendor, all except vendor

  // Route::controller(JobController::class)->group(function () {
  //     Route::get('/jobs', 'index')->name('jobs');
  //     Route::post('/jobs', 'store');
  //     Route::get("/jobs/{job}/edit", 'edit')->where('id', '[0-9]+')->name('job');
  //     Route::put("/jobs/{job}", 'update')->where('id', '[0-9]+')->name('update-job');
  //     Route::delete("/jobs/{job}", 'destroy')->where('id', '[0-9]+')->name('delete-job');
  //     Route::get('/jobs/{job}', 'show')->where('job', '[0-9]+')->name('job');
  //     Route::get('/jobs/search-job-by-title', 'searchByTitle')->name('search-job-by-title');
  // });


  // Route::resource('jobs', JobController::class, [
  //     'only' => [],
  //     'except' => [],
  // ]);

use App\Http\Controllers\CommentController;
use App\Http\Controllers\FavoriteController;
use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\RegisteredUserController;
//Use Alert;




Route::post('/comments/{job}', [CommentController::class, 'store'])
->name('comments.store')
->middleware('auth');

Route::put('/comments/{comment}', [CommentController::class, 'update'])
->name('comments.update')
->can('update', 'comment')
->middleware('auth');

Route::delete('/comments/{comment}', [CommentController::class, 'destroy'])
->name('comments.destroy')
->can('destroy', 'comment')
->middleware('auth');

//Auth
//register


Route::get('/register', [RegisteredUserController::class, 'create'])
->name('auth.register.create');

Route::post('/register', [RegisteredUserController::class, 'store'])
->name('auth.register.store');

Route::middleware('auth')->group(function(){
    Route::get('/my-profile', [RegisteredUserController::class, 'show'])
    ->name('registers.show');

    Route::put('/update-my-profile', [RegisteredUserController::class, 'update'])
    ->name('registers.update');

    Route::delete('/delete-my-profile', [RegisteredUserController::class, 'destroy'])
    ->name('registers.destroy');

    Route::get('/edit-password', [RegisteredUserController::class, 'editPassword'])
    ->name('registers.edit-password');

    Route::post('/check-old-password', [RegisteredUserController::class, 'checkOldPassword'])
    ->name('check-old-password');

});




//login
//! End of episode 22.


Route::get('/login', [SessionController::class, 'create'])
->name('login');

Route::post('/login', [SessionController::class, 'store'])
->name('auth.login.store');


Route::post('/logout', [SessionController::class, 'destroy'])
->name('auth.login.destroy');








Route::view("/", 'home')->name('home');
Route::view('/jobs/create', 'jobs.create')->name('create-job');
Route::view('/contact', 'contact')->name('contact');
Route::get('/jobs/search-job-by-title',
 [JobController::class, 'searchJobByTitle'])
->name('search-job-by-title');


Route::get('/my-jobs', [JobController::class, 'myJobsIndex'])
->name('my-jobs.index')
->middleware('auth');






Route::get('/jobs', [JobController::class, 'index'])
->name('jobs.index');





Route::get('/jobs/create', [JobController::class, 'create'])
->name('jobs.create')
->middleware('auth');


Route::post('/jobs', [JobController::class, 'store'])
->name('jobs.store')
->middleware('auth');
// Route::get('/jobs/{job}/edit', [JobController::class, 'edit'])->middleware(['auth', 'can:edit-job,job']);



Route::get('/jobs/{job}/edit', [JobController::class, 'edit'])
->name('jobs.edit')
->middleware('auth')
->can('edit', 'job');



Route::get('/jobs/{job}', [JobController::class, 'show'])
->name('jobs.show');


Route::put('/jobs/{job}', [JobController::class, 'update'])
->name('jobs.update')
->can('update', 'job')
->middleware('auth');


Route::delete('/jobs/{job}', [JobController::class, 'destroy'])
->name('jobs.destroy')
->can('destroy', 'job')
->middleware('auth');





Route::get('my-favorites',
                        [FavoriteController::class, 'index'])
->name('favorites.index')
->middleware('auth');

Route::post('jobs/{job}/add-to-favorite',
                                 [FavoriteController::class, 'store'])
->name('favorites.store')
->middleware('auth');


Route::delete('jobs/{job}/remove-from-favorite',
                                 [FavoriteController::class, 'destroy'])
->name('favorites.destroy')
->middleware('auth');



















// Route::resource('jobs', JobController::class)
// ->except(['index', 'show'])
// ->middleware('auth')




















// Route::get('/employer-per-job', function() {
//     $employers_with_job = Employer::with('jobs')->get();
//     return view('emp', compact('employers_with_job'));

// });
//
Route::view('/search-about-jobs-employer-by-jobs-title', 'search-about-jobs-employer-by-jobs-title');

Route::get('/get-jobs-emp', function(Request $request) {


    return Job::where('title', $request->validate(['search' => 'required']))
    ->with('employer:name,id')
    ->first()
    ->employer->name;

})->name('search-jobs-emp');





Route::view('/search-about-job-by-employer-name', 'search-about-job-by-employer-name');

Route::get('/get-job', function(Request $request) {
   $givenName = $request->validate(['search' => 'required']);
    return Job::where('employer_id', function($query) use ($givenName) {
        $query->select('id')
              ->from('employers')
              ->where('name', $givenName);
    })->get(['title']);
})->name('search-job');

//


Route::get('ss', function() {
    return to_route('');
});






Route::view('/php-for-bigeners','test');


Route::get('/less-than-or-equals', function() {
    $less_than_or_equals = request('lessThanOrEquals');

    // Check if the parameter is provided and is a numeric value
    if ($less_than_or_equals === null || !ctype_digit($less_than_or_equals)) {
        return Job::all();
    }
    return Job::select('id', 'title', 'employer_id', 'annual_salary', 'integer_salary_for_testing')
    ->where('integer_salary_for_testing', '<=', (int) $less_than_or_equals)
    ->get();

});


Route::get('/greater-than-or-equals', function() {
    $greater_than_or_equals = request('greaterThanOrEquals');
    if (!isset($greater_than_or_equals)) return Job::all();

    return Job::select('id', 'title', 'employer_id', 'annual_salary', 'integer_salary_for_testing')
           ->where('integer_salary_for_testing', '>=', (int) $greater_than_or_equals)
           ->get();

    /*
    $jobs = Job::with(['employer' => function($query) {
                $query->select('id', 'name');
            }])
           ->select('id', 'title', 'employer_id', 'annual_salary', 'integer_salary_for_testing')
           ->where('salary', '>=', 5000)
           ->get();
           */
});

Route::get('/query-parameters-learning', function(){
    $start = request('start');
    $end = request('end');
    $even = request('even');
    $odd = request('odd');

    if (!isset($start) && !isset($end) && !isset($even) && !isset($odd))
        return Job::all();

    if (isset($even) && isset($odd)) {
         return response()->json([
            'error message' => 'can\'t be even and odd at the same time'
        ], 403, [], JSON_PRETTY_PRINT);
    }

    if (isset($start) && isset($end) && !isset($even) && !isset($odd)) {
        $start = (int) $start;
        $end = (int) $end;
        return Job::whereBetween('id', [$start, $end])->get();
    }
    if (isset($even) && !isset($start) && !isset($end) && !isset($odd)) {
        if ($even !== 'true') return Job::all();
        return Job::whereRaw('id % 2 = 0')->get();
    }
    if (isset($odd) && !isset($start) && !isset($end) && !isset($even)) {
        if ($odd !== 'true') return Job::all();
        return Job::whereRaw('id % 2 <> 0')->get();
    }
    if (isset($start) && !isset($end) && !isset($odd) && !isset($even)) {

    }

});




