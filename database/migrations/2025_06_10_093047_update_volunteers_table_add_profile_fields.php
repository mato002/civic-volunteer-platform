<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateVolunteersTableAddProfileFields extends Migration
{
    public function up()
    {
        Schema::table('volunteers', function (Blueprint $table) {
            $table->string('location')->nullable()->after('phone');
            $table->string('profile_picture')->nullable()->after('location');
            $table->json('skills')->nullable()->after('profile_picture');
            $table->json('preferences')->nullable()->after('skills');
            $table->string('two_factor_secret')->nullable()->after('preferences');
            $table->boolean('two_factor_enabled')->default(false)->after('two_factor_secret');
        });
    }

    public function down()
    {
        Schema::table('volunteers', function (Blueprint $table) {
            $table->dropColumn([
                'location',
                'profile_picture',
                'skills',
                'preferences',
                'two_factor_secret',
                'two_factor_enabled'
            ]);
        });
    }
}