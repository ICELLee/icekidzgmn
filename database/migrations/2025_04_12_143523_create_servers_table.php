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
        Schema::create('servers', function (Blueprint $table) {
            $table->id();
            $table->string('server_id')->unique(); // z. B. IKSXXXXXXXXXX
            $table->string('name');
            $table->string('ip');
            $table->enum('mode', ['live', 'manual'])->default('live');
            $table->enum('status', ['online', 'error', 'outage', 'maintenance'])->default('online'); // oder z. B. 'outage'
            $table->string('maintenance_reason')->nullable();
            $table->decimal('uptime', 5, 2)->unsigned()->default(0);
            $table->timestamp('last_checked_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('servers');
    }
};
