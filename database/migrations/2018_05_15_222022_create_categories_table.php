<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('image',255)->nullable();
            $table->enum('status',['approve','waitting','rejected'])->nullable();

            $table->integer('user_id')->nullable();
            $table->string('user_type',50)->nullable();
            $table->string('upload_folder',100)->nullable();
            $table->softDeletes();
            \Kalnoy\Nestedset\NestedSet::columns($table);
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
        Schema::dropIfExists('categories');
    }
}
