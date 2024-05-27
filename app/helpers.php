<?php

if (! function_exists('isFavoritedJob'))
{
    function isFavoritedJob($job)
    {
        return auth()->user()
               ->favoriteJobListings()
               ->where('job_listing_id', $job->id)
               ->exists();
    }
}
