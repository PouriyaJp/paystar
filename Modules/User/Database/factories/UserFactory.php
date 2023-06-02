<?php

namespace Modules\User\Database\factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\User\Entities\User;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'first_name' => 'پوریا',
            'last_name' => 'جمشیدپور',
            'email' => 'pouriya2910@gmail.com',
            'mobile' => '09381307356',
            'national_code' => '0012345678',
        ];
    }
}

