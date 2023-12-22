<?php

namespace Tests\Unit\Services;


use App\Repositories\Contracts\AutorRepositoryContract;
use App\Repositories\Eloquent\AutorRepository;
use App\Services\AutorService;
use Tests\TestCase;
use Mockery;

class AutorServiceTest extends TestCase
{
    public function testInsert()
    {
        $data = [
            'id' => 1,
            'nome' => 'João'
        ];

        $repositoryMock = Mockery::mock(AutorRepository::class, AutorRepositoryContract::class);
        $repositoryMock->shouldReceive('insert')
            ->once()
            ->with($data)
            ->andReturn(true);

        $autorService = new AutorService($repositoryMock);
        $created = $autorService->insert($data);

        $this->assertTrue($created);
    }

    public function testUpdate()
    {
        $data = [
            'id' => 1,
            'nome' => 'João'
        ];

        $repositoryMock = Mockery::mock(AutorRepository::class, AutorRepositoryContract::class);
        $repositoryMock->shouldReceive('update')
            ->once()
            ->with($data['id'], $data)
            ->andReturn(true);

        $autorService = new AutorService($repositoryMock);
        $created = $autorService->update($data['id'], $data);

        $this->assertTrue($created);
    }
}
