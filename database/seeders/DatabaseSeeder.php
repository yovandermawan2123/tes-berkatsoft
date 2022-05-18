<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Customer;
use App\Models\SalesOrder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        Product::create([
            'name' => 'Laptop Asus ROG',
            'price' => 25000000,
            'is_ready' => true,
            'image' => 'laptop.jpg'
        ]
    );

    Product::create([
        'name' => 'HP Samsung Galaxy Fold 3',
        'price' => 13000000,
        'is_ready' => true,
        'image' => 'hp.jpg'
    ]
);

Customer::create([
    'name' => 'Yovan Dermawan',
    'address' => 'Bekasi',
    'no_telephone' => 6281320650059,
    'image' => 'yovan.jpg'
]
);


SalesOrder::create([
    'no_salesorder' => 'SO001',
    'id_customer' => 1,
    'id_product' => 2,
    'quantity' => 2,
    'subtotal' => 500000000
]
);




       
    }
}
