<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('members', function (Blueprint $table) {
            $table->unsignedBigInteger('id')->primary();
            $table->double('membership_fees',8,2);
            $table->string('member_until');
            $table->string('ban_status');
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();

        Schema::table('members', function (Blueprint $table) {

            $table->foreign('id')->references('id')->on('users')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('members');
    }
}
