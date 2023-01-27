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
        Schema::table('projects', function (Blueprint $table) {
            // vado a creare la colonna della Foreign key
            $table->unsignedBigInteger('typology_id')->nullable()->after('id');
            // assegno la foreign key alla colonna creata
            $table->foreign('typology_id')
                ->references('id')
                ->on('typologies')
                ->onDelete('set null');

        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('projects', function (Blueprint $table) {
            // elimino la foreign key
            $table->dropForeign(['typology_id']);
            // eliminazione della colonna
            $table->dropColumn('typology_id');

        });
    }
};
