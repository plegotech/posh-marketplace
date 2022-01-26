<?php

use App\Product;
use App\User;

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends seeder
{
    public function run(): void
    {
        $products = [
            'Phoenix Entertainment NYC',
            'Wildly Different',
            'Tastling NYC | SoFlo',
            'Kindle Store',
            'Nancie',
            'Tama',
            'Camellia',
            'Augustine',
            'Christeen',
            'Luz',
            'Diego',
            'Lyndia',
            'Thomas',
            'Georgianna',
            'Leigha',
            'Alejandro',
            'Marquis',
            'Joan',
            'Stephania',
            'Elroy',
            'Zonia',
            'Buffy',
            'Sharie',
            'Blythe',
            'Gaylene',
            'Elida',
            'Randy',
            'Margarete',
            'Margarett',
            'Dion',
            'Tomi',
            'Arden',
            'Clora',
            'Laine',
            'Becki',
            'Margherita',
            'Bong',
            'Jeanice',
            'Qiana',
            'Lawanda',
            'Rebecka',
            'Maribel',
            'Tami',
            'Yuri',
            'Michele',
            'Rubi',
            'Larisa',
            'Lloyd',
            'Tyisha',
            'Samatha'
        ];

        $images = ['logo_1.png', 'logo_2.png', 'logo_3.png', 'logo_4.png', 'logo_5.png', 'logo_6.png',
            'logo_7.png', 'logo_8.png'];

        $vendor_ids = User::where('user_type', 'vendor')
            ->where('email', 'like', '%@yopmail.com%')
            ->where('status', 'approved')
            ->get()->pluck('id');

        $product_images = ['logo_1.png', 'logo_2.png'];

        for($u = 0; $u < 2000; $u++) {

            $product = $products[array_rand($products)];
            $vendor_id = $vendor_ids->random();

            $image = $images[array_rand($images)];
            array_unshift($product_images, $image);

            $insert = [
                'name'                  => $product,
                'featured_image'        => $image,
                'images'                => json_encode($product_images),
                'sku'                   => 'DUM - '. rand(10, 99) . $u,
                'description'           => '<h3>some description</h3><p>about the product is here.</p>',
                'status'                => 'active',
                'vendor_id'             => $vendor_id,
                'net_price'             => rand(100, 100),
                'sale_price'            => rand(100, 100),
                'parent_category'       => 'computers',
                'sub_category'          => 'dell',
            ];

            array_shift($product_images);
            Product::insert($insert);
        }
    }
}
