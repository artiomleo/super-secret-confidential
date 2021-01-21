<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            // foreignID cu numele  user_id legat prin constrained() la tabela users
            $table->foreignId('user_id')->nullable()->constrained('users');
            // string cu lungimea 3000
            $table->string('description', 3000);
            // enum care accepta doar valorile [1, 2, 3, 4, 5]
            $table->enum('rating', [1, 2, 3, 4, 5]);
            // boolean cu valoarea false pe deafult
            $table->boolean('active')->default(false);
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
        Schema::dropIfExists('reviews');
    }
}
