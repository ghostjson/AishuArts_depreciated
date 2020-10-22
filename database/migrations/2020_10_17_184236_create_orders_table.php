<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();

            $table->integer('payment_id')->nullable();
            $table->decimal('total')->nullable();
            $table->string('name');
            $table->text('address');
            $table->text('district');
            $table->text('state');
            $table->text('country')->default('IN');
            $table->integer('pincode');
            $table->string('email');
            $table->string('phone');
            $table->boolean('shipped')->default(false);
            $table->boolean('accepted')->default(false);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
