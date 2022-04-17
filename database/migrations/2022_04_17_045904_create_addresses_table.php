<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addresses', function (Blueprint $table) {
            $table->uuid('id')->primary()->default(DB::raw('uuid_generate_v4()'));
            $table->foreignUuid('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('address')->nullable();
            $table->foreignId('country_id')->constrained()->onDelete('set null');
            $table->foreignId('province_id')->constrained()->onDelete('set null');
            $table->foreignId('city_id')->constrained()->onDelete('set null');
            $table->foreignId('district_id')->constrained()->onDelete('set null');
            $table->foreignId('village_id')->constrained()->onDelete('set null');
            $table->foreignId('zip_code_id')->constrained()->onDelete('set null');
            $table->string('contact_person_name')->nullable();
            $table->string('contact_person_phone')->nullable();
            $table->boolean('primary')->default(false);
            $table->timestampsTz();
            $table->softDeletesTz();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('addresses');
    }
};
