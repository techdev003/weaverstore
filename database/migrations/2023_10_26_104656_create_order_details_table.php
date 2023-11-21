<?php 
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderDetailsTable extends Migration
{
    public function up()
    {
        Schema::create('order_details', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->decimal('total');
            $table->integer('payment_id');
   
        });
    }

    public function down()
    {
        Schema::dropIfExists('order_details');
    }
}
?>