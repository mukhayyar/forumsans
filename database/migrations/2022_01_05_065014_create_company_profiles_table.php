<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompanyProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_profiles', function (Blueprint $table) {
            $table->id();
            $table->string('company_name');
            $table->string('photo_profile');
            $table->string('company_slug');
            $table->string('website');
            $table->string('deskripsi');
            $table->string('alamat');
            $table->string('negara',50);
            $table->enum('employee',['0-50','50-100','100-150','150-250','250-500','500+']);
            $table->json('sector');
            $table->json('contact');
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
        Schema::dropIfExists('company_profiles');
    }
}
