<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TabelMenus extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dcms_menu', function (Blueprint $tabel) {
            $tabel->increments('id');
            $tabel->integer('parent_id');
            $tabel->string('name',255);
            $tabel->string('url',255);
            $tabel->string('icon');
            $tabel->integer('order');
            $tabel->longText('additional_data');
            $tabel->integer('is_deleted');
            $tabel->string('deleted_by');
            $tabel->dateTime('deleted_date');
            $tabel->string('update_by');
            $tabel->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
