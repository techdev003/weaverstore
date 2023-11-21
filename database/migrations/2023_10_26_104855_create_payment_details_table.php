<?php 
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentDetailsTable extends Migration
{
    public function up()
    {
        Schema::create('payment_details', function (Blueprint $table) {
            $table->id();
            $table->integer('order_id');
            $table->decimal('amount');
            $table->string('status', 45);
        });
    }

    public function down()
    {
        Schema::dropIfExists('payment_details');
    }
}
?>