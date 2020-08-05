<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);
        $this->call([

            // authsTableSeeder::class,
            
            // affiliationsTableSeeder::class, // 呼び出すように追加
            // positionsTableSeeder::class,
            // industrysTableSeeder::class,
            // product_categorysTableSeeder::class,

            // usersTableSeeder::class,

            // ordersTableSeeder::class,
            // saletalksTableSeeder::class,
            // order_historysTableSeeder::class,
            // inquiry_sectionsTableSeeder::class,
            // complaint_sectionsTableSeeder::class,
        ]);
    }
}
