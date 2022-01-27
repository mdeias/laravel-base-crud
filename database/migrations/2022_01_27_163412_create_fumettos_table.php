<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFumettosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fumettos', function (Blueprint $table) {
            $table->id();

            $table->string('title', 100);
            $table->text('description');
            $table->string('thumb');
            $table->decimal('price', 4, 2);
            $table->string('series');
            $table->date('sale_date');
            $table->string('type');
            $table->string('slug', 50);

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
        Schema::dropIfExists('fumettos');
    }
}
