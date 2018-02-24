<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ModifyServerColumns extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
	    Schema::table('servers', function (Blueprint $table) {
		    $table->dropColumn( 'server_parent');
		    $table->integer('parent_id')->unsigned()->nullable();
		    $table->foreign('parent_id')->references('id')->on('servers')->onDelete('set null');
	    });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
	    Schema::table('servers', function (Blueprint $table) {
		    $table->dropForeign( 'parent_id');
		    $table->string( 'server_parent')->nullable();

	    });
    }
}
