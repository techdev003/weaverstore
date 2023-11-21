<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserloginTable extends Migration
{
    public function up()
    {
        Schema::create('userlogin', function (Blueprint $table) {
            $table->id();
            $table->integer('loginId');
            $table->string('UserName', 45);
            $table->string('Password', 45);
            $table->string('email', 45);
            $table->integer('phone');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('userlogin');
    }
}
?>