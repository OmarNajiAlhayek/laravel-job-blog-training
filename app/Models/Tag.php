<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
     use HasFactory;
     public function jobs()
     {
          return $this->belongsToMany(Job::class, relatedPivotKey: 'job_listing_id');
     }
     //$tag = App\Models\Tag::find(1);
     //$tag->jobs;
     //$tag->jobs()->get();
     //$tag->jobs()->attach(7); //or
     //$tag->jobs()->attach(App\Models\Job::find(7));
     //$tag->jobs()->get()->pluck('title');//array of all titles



}
