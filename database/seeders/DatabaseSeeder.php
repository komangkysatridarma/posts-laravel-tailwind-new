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
            'name'=> 'Komang Kysa Tri Darma',
            'username'=> 'Komangg',
            'email'=> 'komangkeyza17@gmail.com',
            'password'=> bcrypt('komang')
        ]);
        // User::create([
        //     'name'=> 'Sen',
        //     'email'=> 'sen@gmail.com',
        //     'password'=> bcrypt('123')
        // ]);

        Category::create([
            'name'=>'Programming',
            'slug'=>'web-programming',
            'deskripsi'=>'Programming merupakan proses pembuatan aplikasi yang di dalamnya melibatkan berbagai jenis tugas, mulai dari mendesain program, mengimplementasikan struktur data dan algoritma, melakukan analisis, coding, testing, hingga debugging. Artinya, coding merupakan salah satu bagian dari programming.',
        ]);
        Category::create([
            'name'=>'Personal',
            'slug'=>'personal',
            'deskripsi'=> 'Personal adalah sebuah istilah yang merujuk kepada hal-hal yang terkait dengan diri seseorang secara individual. Hal ini mencakup kepribadian, nilai-nilai, pengalaman hidup, keinginan, tujuan, dan segala sesuatu yang menjelaskan identitas unik seseorang.'
        ]);
        Category::create([
            'name'=>'Web Design',
            'slug'=>'web-design',
            'deskripsi'=> 'Desain web adalah proses merencanakan, menciptakan, dan mengatur konten yang ditampilkan di sebuah situs web. Hal ini melibatkan berbagai aspek termasuk tata letak, warna, grafis, teks, jenis huruf, gambar, dan interaksi pengguna untuk menciptakan antarmuka web yang menarik dan efektif.'
        ]);
        Category::create([
            'name'=>'Kesehatan',
            'slug'=>'kesehatan',
            'deskripsi'=> 'Kesehatan adalah kondisi optimal dari tubuh, pikiran, dan sosial yang memungkinkan individu untuk berfungsi dengan baik dalam kehidupan sehari-hari. Ini mencakup berbagai aspek seperti fisik, mental, emosional, sosial, dan lingkungan.'
        ]);
        Category::create([
            'name'=>'Makanan',
            'slug'=>'makanan',
            'deskripsi'=> 'Makanan adalah substansi yang dikonsumsi oleh organisme untuk memenuhi kebutuhan gizi dan energi. Ini adalah sumber nutrisi yang memberikan bahan-bahan yang diperlukan untuk pertumbuhan, perkembangan, dan fungsi normal tubuh. Makanan bisa berasal dari berbagai jenis dan memiliki beragam manfaat bagi kesehatan manusia.'
        ]);
        Category::create([
            'name'=>'Olahraga',
            'slug'=>'olahraga',
            'deskripsi'=> 'Olahraga adalah aktivitas fisik terencana dan terstruktur yang dilakukan untuk meningkatkan kebugaran fisik, kesehatan, dan kinerja fisik. Ini mencakup berbagai jenis aktivitas yang membangun kekuatan, daya tahan, kelincahan, fleksibilitas, dan koordinasi. Olahraga tidak hanya memberikan manfaat fisik, tetapi juga manfaat mental dan sosial. '
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
