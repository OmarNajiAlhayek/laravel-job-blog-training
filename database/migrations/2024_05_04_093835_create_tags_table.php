<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Job;
use App\Models\Tag;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tags', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        }); //you can do it in new migration or here.
        //? jobs <-----> tags 
        //? job_tag and so on
        Schema::create('job_tag', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Job::class, 'job_listing_id')->constrained()->cascadeOnDelete(); //oncascadeupdate
            $table->foreignIdFor(Tag::class)->constrained()->cascadeOnDelete();
            $table->timestamps(); //you will need it or not? it dependse on the senario.
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tags');
        Schema::dropIfExists('job_tag');
    }
};
