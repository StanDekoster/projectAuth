<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * https://medium.com/@rpatutorials8910/how-to-store-data-in-a-pivot-table-in-laravel-5375d5a25019
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('faqs_tags', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger('faq_id');
            $table->unsignedBigInteger('tag_id');

            $table->foreign('faq_id')->references('id')->on('f_a_q_s');
            $table->foreign('tag_id')->references('id')->on('tags');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('faqs_tags');
    }
};
