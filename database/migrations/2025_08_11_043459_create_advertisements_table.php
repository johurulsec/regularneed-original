<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdvertisementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('advertisements', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('description')->nullable();
            $table->longText('photo')->nullable();
            $table->string('link_url')->nullable();
            $table->string('target_audience')->nullable();
            $table->string('position')->default('homepage'); // homepage, sidebar, popup, etc.
            $table->timestamp('start_date')->nullable();
            $table->timestamp('end_date')->nullable();
            $table->enum('status', ['active', 'inactive', 'pending'])->default('inactive');
            $table->integer('views_count')->default(0);
            $table->integer('clicks_count')->default(0);
            $table->decimal('budget', 10, 2)->nullable();
            $table->decimal('cost_per_click', 8, 4)->default(0);
            $table->decimal('cost_per_view', 8, 4)->default(0);
            $table->string('ad_type')->default('banner'); // banner, popup, sidebar, etc.
            $table->integer('priority')->default(0);
            $table->boolean('is_featured')->default(false);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('advertisements');
    }
}
