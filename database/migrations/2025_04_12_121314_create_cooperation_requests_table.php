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
        Schema::create('cooperation_requests', function (Blueprint $table) {
            $table->id();
            $table->string('ticket');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email');
            $table->string('project_name')->nullable();
            $table->string('project_type');
            $table->text('why_fit');
            $table->text('expectations');
            $table->text('social_media')->nullable();
            $table->text('coop_suggestion')->nullable();
            $table->integer('team_members')->nullable();
            $table->integer('user_numbers')->nullable();
            $table->string('main_country');
            $table->json('contact_methods');
            $table->string('discord_username')->nullable();
            $table->string('whatsapp_number')->nullable();
            $table->string('instagram_username')->nullable();
            $table->enum('status', ['Offen', 'Standard Unbeantwortet', 'Angenommen', 'Erledigt'])->default('Offen');
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cooperation_requests');
    }
};
