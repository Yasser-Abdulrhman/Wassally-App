<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Area;


class AreaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $areas = [
            ['name' => 'area1' , 'code'  =>  '123'],
            ['name' => 'area2' , 'code'  =>  '124'],
            ['name' => 'area3' , 'code'  =>  '125'],
            ['name' => 'area4' , 'code'  =>  '126'],
            ['name' => 'area4' , 'code'  =>  '127'],
            ['name' => 'area5' , 'code'  =>  '128'],
            ['name' => 'area6' , 'code'  =>  '129'],
            ['name' => 'area7' , 'code'  =>  '130'],

        ];

        foreach($areas as $area){
          Area::create($area);

        }
    }
}
