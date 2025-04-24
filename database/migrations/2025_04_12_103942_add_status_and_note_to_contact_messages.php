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
        Schema::table('contact_messages', function (Blueprint $table) {
            $table->text('attachment')->nullable()->after('reply');
            $table->text('note')->nullable()->after('attachment');
            $table->enum('status', ['offen', 'erledigt'])->default('offen')->after('note');
        });
    }

    public function down(): void
    {
        Schema::table('contact_messages', function (Blueprint $table) {
            $table->dropColumn(['attachment', 'note', 'status']);
        });
    }

};
