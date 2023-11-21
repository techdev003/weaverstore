<?php 
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserInfoTable extends Migration
{
    public function up()
    {
        Schema::create('userinfo', function (Blueprint $table) {
            $table->id();
            $table->integer('UserId');
            $table->string('FirstName', 45);
            $table->string('LastName', 45);
            $table->string('DateOfBirth', 45);
            $table->string('Address', 45);
            $table->string('City', 45);
            $table->string('ZipCode', 45);
            $table->string('Phone', 35);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('userinfo');
    }
}
?>