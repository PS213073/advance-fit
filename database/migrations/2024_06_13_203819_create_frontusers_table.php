<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('frontusers', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->integer('phone_number', 10)->nullable()->autoIncrement(false);
            $table->string('address')->nullable();
            $table->string('postal_code', 6)->nullable();
            $table->string('city')->nullable();
            $table->date('date_of_birth');
            $table->unsignedBigInteger('subscription_id')->nullable(); // Add this line
            $table->foreign('subscription_id')->references('id')->on('subscriptions')->onDelete('set null'); // Foreign key constraint
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('frontusers');
    }
};
