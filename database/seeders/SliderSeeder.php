<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Slider;

class SliderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $slide = new Slider();
        $slide->image = 'item1.jpg';
        $slide->text = 'text';
        $slide->link = 'https://www.google.ru';
        $slide->save();
    }
}
