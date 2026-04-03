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
        Schema::create('ad_views', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('ad_id');
            $table->integer('points_earned')->default(0);
            $table->string('ad_name');
            $table->longText('photo');
            $table->longText('description');
            $table->longText('link_url');
            $table->string('target_audience');
            $table->string('position');
            $table->string('start_date');
            $table->string('end_date');
            $table->enum('status', ['active', 'inactive', 'pending'])->default('inactive');
            $table->integer('views_count')->default(0);
            $table->integer('clicks_count')->default(0);
            $table->boolean('is_featured')->default(false);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ad_views');
    }
};
