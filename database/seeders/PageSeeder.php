<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Page;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $record1 = new Page();
        $record1->attributes = 'title';
        $record1->values = 'text';
        $record1->save();

        $record2 = new Page();
        $record2->attributes = 'email';
        $record2->values = 'adre23@yandex.ru';
        $record2->save();

        $record3 = new Page();
        $record3->attributes = 'logo';
        $record3->values = 'logo.png';
        $record3->save();

        $record4 = new Page();
        $record4->attributes = 'footer_text';
        $record4->values = '<b>hello</b>';
        $record4->save();

    }
}
