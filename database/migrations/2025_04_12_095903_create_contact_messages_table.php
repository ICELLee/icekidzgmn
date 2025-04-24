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
        Schema::create('contact_messages', function (Blueprint $table) {
            $table->id();
            $table->uuid('ticket_number')->unique();
            $table->string('name');
            $table->string('email');
            $table->string('contact_type');
            $table->enum('priority', ['low', 'medium', 'high', 'urgent']);
            $table->text('message');
            $table->text('reply')->nullable();
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contact_messages');
    }
};
