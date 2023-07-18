<?php

namespace App\Models;

class Post{
    private static $blogPosts = [
        [
            "title" => "Judul post pertama",
            "slug" => "judul-post-pertama",
            "author" => "Rahmat fauzi widianto",
            "body" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Reiciendis numquam tempora quam earum dolorum eaque aliquam maxime pariatur consequatur neque iste voluptates exercitationem, quisquam sequi doloribus consequuntur autem ducimus animi omnis voluptatum harum nobis doloremque nulla quos. Accusamus pariatur numquam magnam ea, quibusdam impedit, architecto eligendi autem hic vitae ratione. Dolores placeat similique neque ullam obcaecati? Delectus atque modi, optio magni illum repellat nisi voluptates voluptatibus quidem dolor in, aut quaerat excepturi qui, iusto unde harum. Fugiat quidem nesciunt placeat?"
        ],
        [
            "title" => "Judul post kedua",
            "slug" => "judul-post-kedua",
            "author" => "Heriyanto",
            "body" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Reiciendis numquam tempora quam earum dolorum eaque aliquam maxime pariatur consequatur neque iste voluptates exercitationem, quisquam sequi doloribus consequuntur autem ducimus animi omnis voluptatum harum nobis doloremque nulla quos. Accusamus pariatur numquam magnam ea, quibusdam impedit, architecto eligendi autem hic vitae ratione. Dolores placeat similique neque ullam obcaecati? Delectus atque modi, optio magni illum repellat nisi voluptates voluptatibus quidem dolor in, aut quaerat excepturi qui, iusto unde harum. Fugiat quidem nesciunt placeat?consequuntur autem ducimus animi omnis voluptatum harum nobis doloremque nulla quos. Accusamus pariatur numquam magnam ea, quibusdam impedit, architecto eligendi autem hic vitae ratione. Dolores placeat similique"
        ]
    ];

    public static function getAllPosts(){
        return collect(self::$blogPosts);
    }

    public static function findPost($slug){
        $posts = static::getAllPosts();
        return $posts->firstWhere("slug", $slug);
    }
}