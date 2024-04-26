<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('commands', function (Blueprint $table) {
            // Modify existing columns or add new ones
            $table->string('payment_id')->nullable()->change();
            $table->string('product_name')->nullable()->change();
            $table->integer('quantity')->nullable()->change();
            $table->decimal('amount', 8, 2)->nullable()->change();
            $table->string('currency')->nullable()->change();
            $table->string('payment_status')->nullable()->change();
            $table->string('payment_method')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('commands', function (Blueprint $table) {
            // Rollback the changes if needed
            $table->string('payment_id')->change();
            $table->string('product_name')->change();
            $table->integer('quantity')->change();
            $table->decimal('amount', 8, 2)->change();
            $table->string('currency')->change();
            $table->string('payment_status')->change();
            $table->string('payment_method')->change();
        });
    }
};
