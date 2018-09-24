<?php
use Illuminate\Database\Seeder;
class PostTableSeeder extends Seeder
{
	/**
	* Run the database seeds.
	*
	* @return void
	*/
	public function run()
	{

        //suppression des images avant de lancer les seeds
         // Storage::disk('local')->delete(Storage::allFiles());

             App\Category::create([
            'title' => 'DevOPS'
            ]);
            App\Category::create([
                'title' => 'Javascript'
            ]);
            App\Category::create([
                'title' => 'PHP'
            ]);
            App\Category::create([
                'title' => 'Soft skills'
            ]);

            factory(App\Post::class, 40)->create()->each(function($post){


            $category = App\Category::find(rand(1,4));
            $post->categories()->attach($category);


            $post->save();


            $link = str_random(12) . '.jpg';

            $file = file_get_contents('https://picsum.photos/250/250?image' . rand(1, 20));
            Storage::disk('local')->put($link, $file);

            $post->picture()->create([
                'title' => 'Default', //Valeur par défaut
                'link' => $link, 
            ]);

            $post->save();


        });
        }
    }