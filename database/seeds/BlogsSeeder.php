<?php

use Illuminate\Database\Seeder;

class BlogsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\blog::class,10)->create()->each(function($blog){
            $blog->save();
        });
    }
}
