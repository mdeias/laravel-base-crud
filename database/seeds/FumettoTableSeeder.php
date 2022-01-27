<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Fumetto;
class FumettoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $fumettos = config('comics');
        
        foreach($fumettos as $fumetto){
            
            $new_fumetto = new Fumetto();

            $new_fumetto->title = $fumetto['title'];
            $new_fumetto->description = $fumetto['description'];
            $new_fumetto->thumb = $fumetto['thumb'];
            $new_fumetto->price = $fumetto['price'];
            $new_fumetto->series = $fumetto['series'];
            $new_fumetto->sale_date = $fumetto['sale_date'];
            $new_fumetto->type = $fumetto['type'];
            $new_fumetto->slug = Str::slug($new_fumetto->title, '-');

           $new_fumetto->save();
        }
    }
}
