<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('username');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->enum('type', ['super_admin', 'content_manager']);
            $table->rememberToken();
            $table->timestamps();
        });


        DB::table('admins')->insert([
            [
                'name' => 'Mohamed Osama',
                'username' => 'mosama',
                'email' => "mosama@hotmail.com",
                'password' => Hash::make('password'), // Hashing the password using bcrypt
                'type' => 'super_admin',
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admins');
    }
};