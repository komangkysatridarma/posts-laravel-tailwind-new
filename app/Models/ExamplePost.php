<?php

namespace App\Models;

class Post
{
    private static $blog_posts = [
        [
            "title" => "Blog Pertama",
            "slug"=> "judul-post-pertama",
            "author" => "Komang Kysa",
            "body" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Tenetur quae architecto, sapiente culpa nobis a earum temporibus ullam rem facere eveniet voluptatum, non consequatur deserunt sunt similique officiis pariatur? Repellat quia reiciendis iste natus dicta ea excepturi illum cum ratione, sapiente eveniet nulla voluptatum? Eveniet quia ipsa corporis quibusdam nulla maiores et sunt obcaecati recusandae autem! Numquam officiis inventore doloribus, delectus quisquam amet exercitationem deleniti nesciunt nam voluptatem magni earum corporis cumque ipsa eligendi ut officia itaque molestiae consectetur quod."
        ],
        [
            "title" => "Blog Kdeua",
            "slug"=> "judul-post-kedua",
            "author" => "Iruma",
            "body" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptate quod blanditiis repellendus sit expedita maxime, atque deleniti voluptates distinctio. Libero nostrum eius consequuntur excepturi neque. Blanditiis neque voluptates expedita veniam laborum. Voluptate veniam quidem illo repellendus amet? Consectetur, ad quisquam, iste sed nihil maxime totam quas et, numquam aperiam sint! Ad eos dignissimos voluptatum! Placeat, qui ut! Quidem accusantium incidunt doloremque officiis vitae! Reiciendis illum deserunt libero velit fugit accusamus quia placeat inventore provident modi earum corporis fugiat atque in impedit voluptatibus consequuntur dolores itaque natus, ad officia hic? Velit sint odit in ducimus impedit saepe dolor sit minus tempore id recusandae perferendis, excepturi praesentium voluptatum hic, fugiat optio eum cumque deserunt, repudiandae expedita quas placeat enim omnis. Rem, nihil!"
        ]
        ];

        public static function all(){
            // memakai self untuk memanggil property static
            return self::$blog_posts;
        }

        public static function find($slug){
            // memakai static untuk memanggil method static
            $posts = collect(static::all());

            return $posts->firstWhere('slug',$slug);
}
}