<?php

namespace Modules\Product\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Modules\Product\Entities\Product;
use Modules\Product\Repositories\Interfaces\ProductRepositoryInterface;
use Modules\User\Repositories\Interfaces\UserRepositoryInterface;

class ProductController extends Controller
{

    public function __construct(UserRepositoryInterface $userRepository, ProductRepositoryInterface $productRepository)
    {
        $this->userRepository = $userRepository;
        $this->productRepository = $productRepository;
    }

    public function index()
    {

        //first page

        $user = $this->userRepository->allUser();

        // check user auth or guest
        if ($user){

            $login = Auth::loginUsingId($user->id);

            $product = $this->productRepository->allProduct(); // use repository pattern

            return view('product::index', compact('product'));

        } else {
            return redirect()->route('user.index');
        }

    }

    public function store()
    {
        $product = Product::factory()->count(1)->create(); // for create product, using factory
        return redirect()->back();
    }

}
