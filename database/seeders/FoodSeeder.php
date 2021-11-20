<?php

namespace Database\Seeders;

use App\Models\Food;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FoodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $food = new Food();
        $food->name = 'Ga ran';
        $food->desc = 'ngon';
        $food->image = 'garan.png';
        $food->status = 'top sell';
        $food->price = '20000';
        $food->save();
    }
}
