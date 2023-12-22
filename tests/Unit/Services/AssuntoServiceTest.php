<?php

namespace Tests\Unit\Services;

use App\Repositories\Contracts\AssuntoRepositoryContract;
use App\Repositories\Eloquent\AssuntoRepository;
use App\Services\AssuntoService;
use App\Services\AutorService;
use Mockery;
use Tests\TestCase;

class AssuntoServiceTest extends TestCase
{
    public function testInsert()
    {
        $data = [
            'id' => 1,
            'descricao' => 'Terror'
        ];

        $repositoryMock = Mockery::mock(AssuntoRepository::class, AssuntoRepositoryContract::class);
        $repositoryMock->shouldReceive('insert')
            ->once()
            ->with($data)
            ->andReturn(true);

        $assuntoService = new AssuntoService($repositoryMock);
        $created = $assuntoService->insert($data);

        $this->assertTrue($created);
    }

    public function testUpdate()
    {
        $data = [
            'id' => 1,
            'descricao' => 'Terror'
        ];

        $repositoryMock = Mockery::mock(AssuntoRepository::class, AssuntoRepositoryContract::class);
        $repositoryMock->shouldReceive('update')
            ->once()
            ->with($data['id'], $data)
            ->andReturn(true);

        $assuntoService = new AssuntoService($repositoryMock);
        $created = $assuntoService->update($data['id'], $data);

        $this->assertTrue($created);
    }
}
