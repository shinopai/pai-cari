<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->string('name', 50);
            $table->integer('price');
            $table->text('description', 300);
            $table->enum('condition', ['新品', 'ほぼ未使用', '目立った傷汚れなし', 'やや傷汚れあり', '傷汚れあり']);
            $table->string('item_image');
            $table->enum('postage', ['送料込み', '着払い']);
            $table->timestamps();


            $table->foreignId('brand_id')
                  ->constrained()
                  ->onDelete('cascade');
            $table->foreignId('user_id')
                  ->constrained()
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('items');
    }
};
