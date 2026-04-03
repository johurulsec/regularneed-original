<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = array(
            'description' => "An eCommerce platform is a digital system that allows businesses to sell products or services online. It includes features like product listings, shopping carts, secure payment gateways, order management, and customer support. eCommerce makes it easy for customers to shop from anywhere, at any time.",
            'short_des' => "A platform for buying and selling products online with secure payments and easy order management.",
            'photo' => "https://www.pngkey.com/png/detail/251-2510682_e-commerce-e-commerce-png-logo.png",
            'logo' => 'https://www.shutterstock.com/image-vector/creative-modern-abstract-ecommerce-logo-260nw-2134594701.jpg',
            'address' => "Bangladesh, Dhaka",
            'email' => "adnan@gmail.com",
            'phone' => "+880 17000-00000",
        );
        DB::table('settings')->insert($data);
    }
}