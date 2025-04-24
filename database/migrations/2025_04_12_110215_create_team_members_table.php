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
        Schema::create('team_members', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('ingame_name')->nullable();
            $table->string('role')->nullable();         // IKRID, IKRIPL, ...
            $table->string('position')->nullable();     // z. B. Lead Dev
            $table->string('role_short')->nullable();
            $table->string('role_color')->nullable();   // Tailwind Klassen
            $table->string('profile_image')->nullable();
            $table->string('discord_name')->nullable();
            $table->string('private_email')->nullable();
            $table->string('assigned_email')->nullable();
            $table->boolean('is_active')->default(true);
            $table->text('note')->nullable();
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('team_members');
    }
};
