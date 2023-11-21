<?php 
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderItemTable extends Migration
{
    public function up()
    {
        Schema::create('order_item', function (Blueprint $table) {
            $table->id();
            $table->integer('product_id');
            $table->integer('order_id');
            $table->integer('order_qty');
        });
    }

    public function down()
    {
        Schema::dropIfExists('order_item');
    }
}
?>