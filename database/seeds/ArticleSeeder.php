<?php

use App\Article;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 0; $i < 15; $i++) {
            $article = new Article();
            $article->title = $faker->sentence();
            $article->body = $faker->paragraph(2);
            $article->author = $faker->name();
            $article->image = $faker->imageUrl(400, 600, 'articles', true);
            $article->save();
        }
    }
}
