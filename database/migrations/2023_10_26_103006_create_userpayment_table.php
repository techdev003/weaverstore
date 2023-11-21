<?php 
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserPaymentTable extends Migration
{
    public function up()
    {
        Schema::create('userpayment', function (Blueprint $table) {
            $table->id();
            $table->integer('idAccount');
            $table->integer('userId');
            $table->string('paymentType', 45);
            $table->string('BankName', 45);
            $table->integer('AccountNumber');
            $table->date('exp');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('userpayment');
    }
}
?> 