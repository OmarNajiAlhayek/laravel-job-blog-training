<?php

use App\Models\User;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

// ! php artisan make:model -all --->  model, controller, seeder, policy  <-------
//salary per year.
//$table->decimal('annual_salary', 8, 2);//salary per year.
// TODO: salary per month, is just salary per year devided by 12.
// TODO: Then it's a derived attribute, there will be a method in
// TODO: Job model that handels this situation.
// $table->text() bigger than $table->string()
// $table->foreignIdFor('employer_id');
// $table->unsignedBigInteger('');
//active record
return new class extends Migration
{
    /**
     * Run the migrations.
     */

    // up means applaying the changing what ever you want to change or add or remove
    // applay the migration
    public function up(): void
    {
        Schema::create('job_listings', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->foreignIdFor(User::class);
            
            $table->string('annual_salary');
            $table->unsignedBigInteger('integer_salary_for_testing')->nullable();
            $table->timestamps(); //when did the record created, updated.
        });
    }

    /**
     * Reverse the migrations.
     */

    // down do the inverse of up, up do the thing, down undo the thing.
    // roll it back
    public function down(): void
    {
        Schema::dropIfExists('job_listings');
    }
};
