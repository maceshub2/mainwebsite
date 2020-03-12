<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDisplaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('displays', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->text('logo')->nullable();
            $table->text('banner')->nullable();
            $table->string('bright_color')->nullable();
            $table->string('dark_color')->nullable();
            $table->string('info_1')->nullable();
            $table->string('info_2')->nullable();
            $table->string('s_info_1')->nullable();
            $table->string('s_info_2')->nullable();
            $table->string('s_info_3')->nullable();
            $table->string('s_info_4')->nullable();
            $table->string('icon_1')->nullable();
            $table->string('icon_2')->nullable();
            $table->string('icon_3')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('displays');
    }
}
