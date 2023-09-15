<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Category;
use App\Models\Post;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(4)->create();

        User::create([
            'name'=> 'Komang Kysa',
            'username'=> 'Komang',
            'email'=> 'komangkeyza@gmail.com',
            'password'=> bcrypt('123')
        ]);
        // User::create([
        //     'name'=> 'Sen',
        //     'email'=> 'sen@gmail.com',
        //     'password'=> bcrypt('123')
        // ]);

        Category::create([
            'name'=>'Programming',
            'slug'=>'web-programming'
        ]);
        Category::create([
            'name'=>'Personal',
            'slug'=>'personal'
        ]);
        Category::create([
            'name'=>'Web Design',
            'slug'=>'web-design'
        ]);

        Post::factory(20)->create();
        // Post::create([
        //     'title'=>'Judul Pertama',
        //     'slug'=>'judul-pertama',
        //     'excerpt'=>'Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquam nemo quos
        //                 maxime repellendus natus',
        //     'body'=> 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquam nemo quos
        //             maxime repellendus natus reiciendis velit tempore necessitatibus modi,
        //             explicabo, quis ullam ipsam quasi nisi consectetur tempora? Deleniti porro est
        //             asperiores, reiciendis error temporibus accusamus dolorem laborum velit
        //             necessitatibus, ad laudantium a perspiciatis expedita! Sed perferendis quia
        //             iusto cupiditate nesciunt recusandae voluptatibus in cum. Odio dolor maxime
        //             tenetur ut, nihil, vitae molestiae eos ipsum dolorum ipsa accusantium quisquam
        //             molestias iusto minus veritatis porro totam qui id beatae ea eligendi cum! Optio
        //             delectus reprehenderit vitae dolore non earum, officiis ab laborum, saepe
        //             aliquid enim culpa vel veritatis in quam deleniti quos unde, nobis error debitis
        //             amet qui. In sapiente aperiam illum? Nulla tempora placeat iusto minus. Dolor,
        //             temporibus nostrum itaque rerum quae aliquam.',
        //     'category_id'=>1,
        //     'user_id'=>1
        // ]);
        // Post::create([
        //     'title'=>'Judul Kedua',
        //     'slug'=>'judul-kedua',
        //     'excerpt'=>'Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquam nemo quos
        //                 maxime repellendus natus',
        //     'body'=> 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquam nemo quos
        //             maxime repellendus natus reiciendis velit tempore necessitatibus modi,
        //             explicabo, quis ullam ipsam quasi nisi consectetur tempora? Deleniti porro est
        //             asperiores, reiciendis error temporibus accusamus dolorem laborum velit
        //             necessitatibus, ad laudantium a perspiciatis expedita! Sed perferendis quia
        //             iusto cupiditate nesciunt recusandae voluptatibus in cum. Odio dolor maxime
        //             tenetur ut, nihil, vitae molestiae eos ipsum dolorum ipsa accusantium quisquam
        //             molestias iusto minus veritatis porro totam qui id beatae ea eligendi cum! Optio
        //             delectus reprehenderit vitae dolore non earum, officiis ab laborum, saepe
        //             aliquid enim culpa vel veritatis in quam deleniti quos unde, nobis error debitis
        //             amet qui. In sapiente aperiam illum? Nulla tempora placeat iusto minus. Dolor,
        //             temporibus nostrum itaque rerum quae aliquam.',
        //     'category_id'=>1,
        //     'user_id'=>2
        // ]);
        // Post::create([
        //     'title'=>'Judul Ketiga',
        //     'slug'=>'judul-ketiga',
        //     'excerpt'=>'Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquam nemo quos
        //                 maxime repellendus natus',
        //     'body'=> 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquam nemo quos
        //             maxime repellendus natus reiciendis velit tempore necessitatibus modi,
        //             explicabo, quis ullam ipsam quasi nisi consectetur tempora? Deleniti porro est
        //             asperiores, reiciendis error temporibus accusamus dolorem laborum velit
        //             necessitatibus, ad laudantium a perspiciatis expedita! Sed perferendis quia
        //             iusto cupiditate nesciunt recusandae voluptatibus in cum. Odio dolor maxime
        //             tenetur ut, nihil, vitae molestiae eos ipsum dolorum ipsa accusantium quisquam
        //             molestias iusto minus veritatis porro totam qui id beatae ea eligendi cum! Optio
        //             delectus reprehenderit vitae dolore non earum, officiis ab laborum, saepe
        //             aliquid enim culpa vel veritatis in quam deleniti quos unde, nobis error debitis
        //             amet qui. In sapiente aperiam illum? Nulla tempora placeat iusto minus. Dolor,
        //             temporibus nostrum itaque rerum quae aliquam.',
        //     'category_id'=>3,
        //     'user_id'=>2
        // ]);
    }
}
