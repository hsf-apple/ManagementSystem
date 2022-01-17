<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApprovalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('_approval', function (Blueprint $table) {
            $table->id('approvalID');
            $table->unsignedBigInteger('studentId')->nullable();
            $table->unsignedBigInteger('lectureId')->nullable();
            $table->unsignedBigInteger('proposalID')->nullable();
            $table->string('status');
            $table->string('reasons');

            //foreign key
            $table->foreign('studentId')->references('studentId')->on('studentprofile');
            $table->foreign('lectureId')->references('lectureId')->on('lectureprofile');
            $table->foreign('proposalID')->references('proposalID')->on('proposal');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('_approval');
    }
}
