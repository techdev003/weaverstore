<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartItemTable extends Migration
{
    public function up()
    {
        Schema::create('cart_item', function (Blueprint $table) {
            $table->id();
            $table->integer('session_id');
            $table->integer('product_id');
            $table->integer('quantity');
            $table->timestamps();
            $table->softDeletes();
            $table->integer('cart_item_dart_tem');
        });
    }

    public function down()
    {
        Schema::dropIfExists('cart_item');
    }
}

?>