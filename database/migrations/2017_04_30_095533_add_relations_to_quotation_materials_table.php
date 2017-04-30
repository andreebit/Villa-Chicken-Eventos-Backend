<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRelationsToQuotationMaterialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('evt_quotation_materials', function (Blueprint $table) {
            $table->integer('quotation_id')->unsigned();
            $table->integer('material_id')->unsigned();
        });

        Schema::table('evt_quotation_materials', function (Blueprint $table) {
            $table->foreign('quotation_id')->references('id')->on('evt_quotations')
                ->onDelete('restrict')
                ->onUpdate('restrict');
        });
        Schema::table('evt_quotation_materials', function (Blueprint $table) {
            $table->foreign('material_id')->references('id')->on('evt_materials')
                ->onDelete('restrict')
                ->onUpdate('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('evt_quotation_materials', function (Blueprint $table) {
            $table->dropColumn('quotation');
            $table->dropColumn('material_id');
        });
    }
}
