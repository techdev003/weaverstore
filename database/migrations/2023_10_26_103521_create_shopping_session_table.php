<?php 
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShoppingSessionTable extends Migration
{
    public function up()
    {
        Schema::create('shopping_session', function (Blueprint $table) {
            $table->id();
            $table->integer('UserId');
            $table->decimal('Total');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('shopping_session');
    }
}
?>