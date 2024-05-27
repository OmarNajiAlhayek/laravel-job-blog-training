<?php

namespace App\Models;

use App\Models\Image;
use App\Models\Comment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
 use App\Models\User;
//use Illuminate\Support\Arr;
// //namespace is a way to organize your files
// // our class have the name Job, but if you search about it in the
// // all of the project by typing ctrl + p
// // you will find alot of Job classes
// // then we will use namespace to prevent this collengens

// //composer.json/autoload psr-4

// // if it's a small work,
// // then keep it simple it's just fine

// // if it's a real, and
// class Job {
//     public static function all() : array
//     {
//         return [
//             [
//                 'id' => 1,
//                 'title' => 'Programmer',
//                 'salary' => '$100,000',
//             ],
//             [
//                 'id' => 2,
//                 'title' => 'Teacher',
//                 'salary' => '$10,000',
//             ],
//             [
//                 'id' => 3,
//                 'title' => 'Omar',
//                 'salary' => '$50,000',
//             ],
//         ];
//     }
//     //if return null, and the returning type is not array,
//     // then the problem will be in the views,
//     // you will get:
//     // ErrorExeption
//     //Trying to access array offset on null

//     //if return null, and the returning type is array,
//     // then the problem will be in this class,
//     // you will get:
//     //App\Models\Job::find(): Return value must be of type array, null returned



//     public static function find(int $id): array
//     {
//         $job = Arr::first(static::all(), fn($job) => $job['id'] === $id);
//         if (! $job)
//         {
//             abort(404);
//         }
//         return $job;
//     }
// }


// ? table caled comments => model called Comment
// ? table_name | model_name
// ?   comments | Comment
// ?       jobs | Job
// ?      users | User
// ?      posts | Post
// ?   products | Product


// ! Eloquent have it's own api of how we can query the database
// ! since we have a table called jobs that is exists by default
// ! we can resolve this in 2 ways
// make the model name: JobListings,
// or change the table that is connected with this model from jobs to job_listings table.

// models provides some safety from mass assinments
// to prevent user from injecting html inpus without knowing of you.

//! Probably you will build the model befour the migration.
class Job extends Model
{
     use HasFactory;
     protected $table = 'job_listings';
     protected $fillable = [ //! opisit of $gurderd
                              'title',
                              'annual_salary',
                              'number_of_favorites',
                              'user_id',
                           ];

    //  protected $dispatc

                           //TODO try hidded.


     public function user(): BelongsTo
     {
          return $this->belongsTo(User::class);
     }

    public function favoritedByUsers(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'job_listing_user', 'job_listing_id', 'user_id');
    }

     public function tags(): BelongsToMany
     {
          return $this->belongsToMany(Tag::class, foreignPivotKey: 'job_listing_id');
     }

     public function comments(): HasMany
     {
        return $this->hasMany(Comment::class, 'job_listing_id');
     }

     public function image(): MorphOne
    {
        return $this->morphOne(Image::class, 'imageable');
    }

}
