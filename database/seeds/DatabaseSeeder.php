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
        $user = factory(App\User::class)->create(['email' => 'admin@mail.com']);
        $customer = factory(App\Customer::class)->create();
        $category = factory(App\Category::class)->create();
        $products = factory(App\Product::class, 10)->create(['category_id' => $category->id]);

        // $this->call(UsersTableSeeder::class);
    }
}
