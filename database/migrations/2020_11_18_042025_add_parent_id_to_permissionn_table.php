<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddParentIdToPermissionnTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('permissions', function (Blueprint $table) {
            //
            $table->integer('parent_id')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('permissions', function (Blueprint $table) {
            //
            $table->dropColumn('parent_id');
        });
    }
}
