<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
     	factory(App\Category::class, 15)->create()
            ->each(function ($category) {
                $category->words()->saveMany(factory(App\Word::class, 25)->make());
            });
        App\Word::all()->each(function ($word) {
            $answers = collect([
                factory(App\Answer::class)->make(),
                factory(App\Answer::class)->make(),
                factory(App\Answer::class)->make(),
                factory(App\Answer::class)->make(['is_correct' => 1]),
            ]);
            $word->answers()->saveMany($answers);
        });
    }
}
