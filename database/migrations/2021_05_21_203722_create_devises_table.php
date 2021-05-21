<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateDevisesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('devises')){
            Schema::create('devises', function (Blueprint $table) {
                $table->id();
                $table->string('code', 3);
                $table->string('symbole', 1);
                $table->unsignedDouble('equivalent_USD');
            });

            // Insertion des données de base
            DB::table('devises')->insert(['code' => 'USD', 'symbole' => '$', 'equivalent_USD' => 1]);
            DB::table('devises')->insert(['code' => 'EUR', 'symbole' => '€', 'equivalent_USD' => 1.11111]);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('devises');
    }
}
