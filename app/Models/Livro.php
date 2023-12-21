<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Livro extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo',
        'editora',
        'edicao',
        'ano_publicacao',
        'preco',
    ];

    protected $table = 'livro';

    public function livroAutor(): BelongsToMany
    {
        return $this->belongsToMany(Autor::class, 'livro_autor');
    }

    public function livroAssunto(): BelongsToMany
    {
        return $this->belongsToMany(Assunto::class, 'livro_assunto');
    }
}
