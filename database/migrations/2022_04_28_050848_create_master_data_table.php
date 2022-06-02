<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMasterDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('master_data', function (Blueprint $table) {
            $table->id();
            $table->string('warehouse_class')->nullable();
            $table->string('delivery_form')->nullable();
            $table->string('item_no')->nullable();
            $table->string('item_rev')->nullable();
            $table->integer('delivery_qty')->nullable();
            $table->string('stock_address')->nullable();
            $table->string('manufacturing_no')->nullable();
            $table->date('delivery_inst_date')->nullable();
            $table->string('destination_code')->nullable();
            $table->string('item_name')->nullable();
            $table->string('product_no')->nullable();
            $table->string('ticket_no')->nullable();
            $table->date('ticket_issue_date')->nullable();
            $table->timestamp('ticket_issue_time')->nullable();
            $table->string('storage_location')->nullable();
            $table->date('delivery_due_date')->nullable();
            $table->string('order_download_no')->nullable();
            $table->integer('process_masterlist_id')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('master_data');
    }
}
