<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
<<<<<<< HEAD
<<<<<<< HEAD
            $table->string('lastname')->default('');
            $table->string('name')->default('');
            $table->string('email')->unique();
            $table->string('password');
            $table->timestamps();
=======
            $table->string('username', 50)->unique();
            $table->string('email')->unique();
            $table->string('password');
            $table->dateTime('registration_date');
            $table->boolean('is_admin')->default(false);
>>>>>>> 597fc93643cef5bb016b667e61ede7ddcc1b52d5
=======
            $table->string('username', 50)->unique();
            $table->string('email')->unique();
            $table->string('password');
            $table->dateTime('registration_date');
            $table->boolean('is_admin')->default(false);
>>>>>>> origin/tolga
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
