<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    // public function up()
    // {
    //     Schema::create('ads', function (Blueprint $table) {
    //         $table->id();

    //         // Basic info
    //         $table->string('title');
    //         $table->text('description')->nullable();
    //         $table->longText('image')->nullable();
    //         $table->string('link')->nullable();

    //         // Targeting & placement
    //         $table->string('target_audience')->nullable();
    //         $table->string('position')->nullable();

    //         // Timing
    //         $table->timestamp('start_date')->nullable();
    //         $table->timestamp('end_date')->nullable();

    //         // Status & flags
    //         $table->enum('status', ['active', 'inactive'])->default('active');
    //         $table->boolean('is_featured')->default(false);

    //         // Coin reward settings (general)
    //         $table->integer('coins_per_view')->default(0);
    //         $table->integer('coins_per_click')->default(0);

    //         // Coin reward settings (subscriber-specific)
    //         $table->integer('coins_per_view_subscriber')->default(0);
    //         $table->integer('coins_per_click_subscriber')->default(0);
    //         $table->integer('coins_per_view_non_subscriber')->default(0);
    //         $table->integer('coins_per_click_non_subscriber')->default(0);

    //         // Limits & budgets
    //         $table->integer('max_coins_per_user')->nullable();
    //         $table->integer('total_coins_budget')->nullable();

    //         $table->timestamps();
    //     });
    // }

    public function up()
    {
        Schema::create('ads', function (Blueprint $table) {
            $table->id();

            // Basic info
            $table->string('title');
            $table->text('description')->nullable();
            $table->longText('image')->nullable(); // longText is okay if you store base64 or JSON; else string might be enough
            $table->string('link')->nullable();

            // Targeting & placement
            $table->string('target_audience')->nullable();
            $table->string('position')->nullable();

            // Timing
            $table->timestamp('start_date')->nullable();
            $table->timestamp('end_date')->nullable();

            // Status & flags
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->boolean('is_featured')->default(false);

            // Coin reward settings (subscriber-specific)
            $table->integer('coins_per_view_subscriber')->default(0);
            $table->integer('coins_per_click_subscriber')->default(0);
            $table->integer('coins_per_view_non_subscriber')->default(0);
            $table->integer('coins_per_click_non_subscriber')->default(0);

            // Limits & budgets
            $table->integer('max_coins_per_user')->nullable();
            $table->integer('total_coins_budget')->nullable();

            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ads');
    }
};
