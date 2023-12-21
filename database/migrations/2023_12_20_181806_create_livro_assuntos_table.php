<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('livro_assunto', function (Blueprint $table) {
            $table->foreignId('livro_id')->constrained(
                table: 'livro',
                indexName: 'livro_assunto_livro_id'
            );
            $table->foreignId('assunto_id')->constrained(
                table: 'assunto',
                indexName: 'livro_assunto_assunto_id'
            );
            $table->primary(['livro_id', 'assunto_id']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('livro_assunto');
    }
};
