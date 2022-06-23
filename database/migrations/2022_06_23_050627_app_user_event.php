<?php

use App\Models\User;
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
        Schema::create('event', function(Blueprint $table){
            $table->id();
            $table->string('name');
            $table->string('meetLocation');
            $table->string('description');
            $table->string('eventLink');
            $table->string('type');
            $table->string('inviteeQuestions');
            $table->foreignIdFor(User::class);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
