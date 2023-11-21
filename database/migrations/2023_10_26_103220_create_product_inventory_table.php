<?php 
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductInventoryTable extends Migration
{
    public function up()
    {
        Schema::create('product_inventory', function (Blueprint $table) {
            $table->id();
            $table->integer('idProduct');
            $table->integer('Inventory');
            $table->integer('Quantity');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('product_inventory');
    }
}
?>