<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::table('users', function (Blueprint $table) {
        $table->boolean('is_teacher')->default(false);
        $table->boolean('is_admin')->default(false);
        $table->boolean('is_pupil')->default(false);
        $table->string('profile_picture')->nullable();
        $table->string('phone_number')->nullable();
        $table->date('birthday')->nullable();
        $table->boolean('subscription_active')->default(false);
    });
}

public function down()
{
    Schema::table('users', function (Blueprint $table) {
        $table->dropColumn('is_teacher');
        $table->dropColumn('is_admin');
        $table->dropColumn('is_pupil');
        $table->dropColumn('profile_picture');
        $table->dropColumn('phone_number');
        $table->dropColumn('birthday');
        $table->dropColumn('subscription_active');
    });
}

};
