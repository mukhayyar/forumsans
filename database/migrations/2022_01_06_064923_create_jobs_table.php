<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_id')->constrained('company_profiles')->onDelete('cascade')->onUpdate('cascade');
            $table->string('role');
            $table->string('description');
            $table->string('qualification');
            $table->enum('type',['Intern','Full Time', 'Freelance','Contract']);
            $table->enum('year_experience',['2 Years', '3-5 Years', '5+ Years', '10+ Years']);
            $table->enum('edu_level',['SMA Sederajat','D3','S1/D4','S2','S3']);
            $table->json('contact');
            $table->date('end_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jobs');
    }
}
