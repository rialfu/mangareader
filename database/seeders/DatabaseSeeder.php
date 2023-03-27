<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Manga;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $genre = \App\Models\Genre::insert([
            ['name_genre'=>'Romance'],
            ['name_genre'=>'Comedy'],
            ['name_genre'=>'Fantasy'],
            ['name_genre'=>'Slice of Life'],
        ]);
        Manga::factory(11)->create()->each(function($manga) use($genre){
            $len = rand(1,4);
            $data=$len == 1 ? [1] :( $len == 2 ? [ 2, 3] : ($len == 3 ? [ 1,3,4] : [2,4, 1] ) );
            $manga->genres()->attach($data);
        });
        // echo rand(0,5);
    }
}
