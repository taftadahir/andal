<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->id();

            $table->foreignId('author')->constrained('users');
            $table->foreignId('banner')->nullable()->constrained('assets');

            $table->string('title');
            $table->string('slug')->unique();

            $table->text('content')->nullable();
            $table->text('excerpt')->nullable();

            $table->bigInteger('read_time')->nullable();
            $table->bigInteger('views')->default(0);
            $table->string('status')->default('draft');

            $table->timestamp('published_at')->nullable();
            $table->timestamp('archived_at')->nullable();

            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('articles');
    }
};
