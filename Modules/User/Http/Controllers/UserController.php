<?php

namespace Modules\User\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\User\Database\factories\UserFactory;
use Modules\User\Entities\User;
use Modules\User\Http\Requests\UserRequest;
use Modules\User\Repositories\Interfaces\UserRepositoryInterface;

class UserController extends Controller
{

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function index()
    {

        // page for information user

        $user = $this->userRepository->allUser(); //use repository pattern
        return view('user::index', compact('user'));
    }

    public function store()
    {

        $user = User::factory()->count(1)->create(); // for create user, using factory
        return redirect()->route('index');

    }
}
