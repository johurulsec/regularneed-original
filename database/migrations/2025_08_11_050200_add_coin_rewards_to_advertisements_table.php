<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCoinRewardsToAdvertisementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('advertisements', function (Blueprint $table) {
            $table->integer('coins_per_view')->default(0)->after('is_featured');
            $table->integer('coins_per_click')->default(0)->after('coins_per_view');
            $table->integer('max_coins_per_user')->nullable()->after('coins_per_click');
            $table->integer('total_coins_budget')->nullable()->after('max_coins_per_user');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('advertisements', function (Blueprint $table) {
            $table->dropColumn([
                'coins_per_view',
                'coins_per_click',
                'max_coins_per_user',
                'total_coins_budget'
            ]);
        });
    }
}
