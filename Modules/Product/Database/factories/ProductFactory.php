<?php

namespace Modules\Product\Database\factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = \Modules\Product\Entities\Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => 'آیفون 13',
            'introduction' => 'گوشی موبایل اپل مدل iPhone 13 Pro ZAA دو سیم‌ کارت ظرفیت 1 ترابایت و 6 گیگابایت رم - نات اکتیو',
            'image' => 'https://dkstatics-public.digikala.com/digikala-products/3910c1b7d3fb16a312a98e2505ed6146dc82191d_1653816977.jpg?x-oss-process=image/resize,m_lfit,h_800,w_800/quality,q_90',
            'price' => '100000',
            'status' => '1',
        ];
    }
}

