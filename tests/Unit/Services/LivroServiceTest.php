<?php

namespace Tests\Unit\Services;
use App\Repositories\Contracts\LivroRepositoryContract;
use App\Repositories\Eloquent\LivroRepository;
use App\Services\LivroService;
use Tests\TestCase;
use Mockery;

class LivroServiceTest extends TestCase
{
    public function testInsert()
    {
        $data = [
            'titulo' => 'Um Livro Especial',
            'editora' => 'Editora Teste',
            'edicao' => '1',
            'ano_publicacao' => 2018,
            'preco' => 25,
        ];

        $repositoryMock = Mockery::mock(LivroRepository::class, LivroRepositoryContract::class);

        $repositoryMock->shouldReceive('insert')
            ->once()
            ->with($data)
            ->andReturn(true);

        $livroService = new LivroService($repositoryMock);

        $created = $livroService->insert($data);

        $this->assertTrue($created);
    }

    public function testUpdate()
    {
        $data = [
            'id' => 1,
            'titulo' => 'Um Livro Especial',
            'editora' => 'Editora Teste',
            'edicao' => '1',
            'ano_publicacao' => 2018,
            'preco' => 25,
        ];

        $repositoryMock = Mockery::mock(LivroRepository::class, LivroRepositoryContract::class);
        $livroService = new LivroService($repositoryMock);

        $repositoryMock->shouldReceive('update')
            ->once()
            ->with($data['id'], $data)
            ->andReturn(true);


        $created = $livroService->update($data['id'], $data);

        $this->assertTrue($created);
    }
}
