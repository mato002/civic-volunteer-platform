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
    Schema::table('organizations', function (Blueprint $table) {
        $table->string('password')->after('email'); // or after whatever column you prefer
    });
}

public function down()
{
    Schema::table('organizations', function (Blueprint $table) {
        $table->dropColumn('password');
    });
}
};
