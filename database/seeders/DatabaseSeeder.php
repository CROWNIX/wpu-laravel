<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Post;
use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            "name" => "Rahmat fauzi",
            "username" => "rahmat fauzi",
            "email" => "rahmat@gmail.com",
            "password" => bcrypt("12345")
        ]);
        User::factory(3)->create();

        
        // User::create([
        //     "name" => "Heriyanto",
        //     "email" => "heriyanto@gmail.com",
        //     "password" => Hash::make("123456")
        // ]);

        Category::create([
            "name" => "Web Programming",
            "slug" => "web-programming"
        ]);
        
        Category::create([
            "name" => "Web Design",
            "slug" => "web-design"
        ]);

        Category::create([
            "name" => "Personal",
            "slug" => "personal"
        ]);

        Post::factory(30)->create();

        // Post::create([
        //     "title" => "Judul Pertama",
        //     "slug" => "judul-pertama",
        //     "excerpt" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Rem enim nihil ex animi aliquid, voluptate itaque quaerat nemo ipsam dolor reiciendis, suscipit quibusdam earum! Ullam, est, cum omnis hic ipsa doloribus optio neque maxime sed.",
        //     "body" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Rem enim nihil ex animi aliquid, voluptate itaque quaerat nemo ipsam dolor reiciendis, suscipit quibusdam earum! Ullam, est, cum omnis hic ipsa doloribus optio neque maxime sed, possimus fugit? Aliquam veniam a obcaecati et ullam quo molestias deserunt dolore ipsum similique aliquid magnam laboriosam nulla sit labore, eos fugiat deleniti, eius accusantium aut. Ipsum quam impedit labore blanditiis non, sequi autem minus iure excepturi, id, numquam debitis eaque laborum dolores doloribus! Ea cupiditate tempora perspiciatis et dignissimos minus quam iste nulla error, quas, eaque aspernatur, sit voluptatibus maiores doloremque reiciendis aliquid magni!",
        //     "category_id" => 1,
        //     "user_id" => 1
        // ]);

        // Post::create([
        //     "title" => "Judul Kedua",
        //     "slug" => "judul-kedua",
        //     "excerpt" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Rem enim nihil ex animi aliquid, voluptate itaque quaerat nemo ipsam dolor reiciendis, suscipit quibusdam earum! Ullam, est, cum omnis hic ipsa doloribus optio neque maxime sed.",
        //     "body" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Rem enim nihil ex animi aliquid, voluptate itaque quaerat nemo ipsam dolor reiciendis, suscipit quibusdam earum! Ullam, est, cum omnis hic ipsa doloribus optio neque maxime sed, possimus fugit? Aliquam veniam a obcaecati et ullam quo molestias deserunt dolore ipsum similique aliquid magnam laboriosam nulla sit labore, eos fugiat deleniti, eius accusantium aut. Ipsum quam impedit labore blanditiis non, sequi autem minus iure excepturi, id, numquam debitis eaque laborum dolores doloribus! Ea cupiditate tempora perspiciatis et dignissimos minus quam iste nulla error, quas, eaque aspernatur, sit voluptatibus maiores doloremque reiciendis aliquid magni!",
        //     "category_id" => 1,
        //     "user_id" => 1
        // ]);

        // Post::create([
        //     "title" => "Judul Ketiga",
        //     "slug" => "judul-ketiga",
        //     "excerpt" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Rem enim nihil ex animi aliquid, voluptate itaque quaerat nemo ipsam dolor reiciendis, suscipit quibusdam earum! Ullam, est, cum omnis hic ipsa doloribus optio neque maxime sed.",
        //     "body" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Rem enim nihil ex animi aliquid, voluptate itaque quaerat nemo ipsam dolor reiciendis, suscipit quibusdam earum! Ullam, est, cum omnis hic ipsa doloribus optio neque maxime sed, possimus fugit? Aliquam veniam a obcaecati et ullam quo molestias deserunt dolore ipsum similique aliquid magnam laboriosam nulla sit labore, eos fugiat deleniti, eius accusantium aut. Ipsum quam impedit labore blanditiis non, sequi autem minus iure excepturi, id, numquam debitis eaque laborum dolores doloribus! Ea cupiditate tempora perspiciatis et dignissimos minus quam iste nulla error, quas, eaque aspernatur, sit voluptatibus maiores doloremque reiciendis aliquid magni!",
        //     "category_id" => 2,
        //     "user_id" => 1
        // ]);
        
        // Post::create([
        //     "title" => "Judul Keempat",
        //     "slug" => "judul-keempat",
        //     "excerpt" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Rem enim nihil ex animi aliquid, voluptate itaque quaerat nemo ipsam dolor reiciendis, suscipit quibusdam earum! Ullam, est, cum omnis hic ipsa doloribus optio neque maxime sed.",
        //     "body" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Rem enim nihil ex animi aliquid, voluptate itaque quaerat nemo ipsam dolor reiciendis, suscipit quibusdam earum! Ullam, est, cum omnis hic ipsa doloribus optio neque maxime sed, possimus fugit? Aliquam veniam a obcaecati et ullam quo molestias deserunt dolore ipsum similique aliquid magnam laboriosam nulla sit labore, eos fugiat deleniti, eius accusantium aut. Ipsum quam impedit labore blanditiis non, sequi autem minus iure excepturi, id, numquam debitis eaque laborum dolores doloribus! Ea cupiditate tempora perspiciatis et dignissimos minus quam iste nulla error, quas, eaque aspernatur, sit voluptatibus maiores doloremque reiciendis aliquid magni!",
        //     "category_id" => 2,
        //     "user_id" => 2
        // ]);

    }
}