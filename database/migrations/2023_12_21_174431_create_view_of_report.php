<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
USE Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::statement("
         CREATE VIEW view_autores_livros_assuntos AS
            SELECT
                autor.id AS autor_id,
                autor.nome AS autor_nome,
                GROUP_CONCAT(DISTINCT livro.id) AS livros_ids,
                COUNT(livro.id) AS total_livros,
                GROUP_CONCAT(DISTINCT livro.titulo) AS titulos_livros,
                GROUP_CONCAT(DISTINCT assunto.id) AS assuntos_ids,
                GROUP_CONCAT(DISTINCT assunto.descricao) AS descricoes_assuntos
                FROM
                    livro
                LEFT JOIN livro_assunto ON livro_assunto.livro_id = livro.id
                LEFT JOIN assunto ON assunto.id = livro_assunto.assunto_id
                LEFT JOIN livro_autor ON livro_autor.livro_id = livro.id
                LEFT JOIN autor ON autor.id = livro_autor.autor_id
                GROUP BY
                    autor.id, autor.nome
    ");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement("DROP VIEW view_autores_livros_assuntos");
    }
};
