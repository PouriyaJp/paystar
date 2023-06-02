<?php

namespace Modules\User\Tests\Unit;

use Modules\User\Database\factories\UserFactory;
use Modules\User\Http\Controllers\UserController;
use Modules\User\Repositories\Interfaces\UserRepositoryInterface;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;


class EloquentUserRepositoryTest extends TestCase
{

    public function testExample()
    {
        $this->assertTrue(true);
    }

    use RefreshDatabase;

    public function testIndex()
    {
        $user = UserFactory::new()->create();

        $userRepositoryMock = $this->createMock(UserRepositoryInterface::class);
        $userRepositoryMock->expects($this->once())
            ->method('allUser')
            ->willReturn([$user]);

        $controller = new UserController($userRepositoryMock);
        $response = $controller->index();

        $response->assertViewHas('user', [$user]);
    }

    public
    function testStore()
    {
        $this->withoutExceptionHandling();

        $controller = new UserController($this->app->make(UserRepositoryInterface::class));
        $response = $controller->store();

        $response->assertRedirect(route('index'));

        $this->assertDatabaseCount('users', 1);
        $this->assertInstanceOf(User::class, User::first());
    }
}
