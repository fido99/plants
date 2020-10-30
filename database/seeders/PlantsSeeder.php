<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Plants;

class PlantsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$plants = new Plants();
        $plants->name = 'Пихта белая';
        $plants->save();
    }
}
