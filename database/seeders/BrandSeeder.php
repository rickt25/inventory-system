<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Database\Seeder;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $brands = [
            'Philips',
            'Hannochs',
            'Eco King',
            'Visalux',
            'Pioline',
        ];

        foreach($brands as $brand){
            Brand::create([
                'name' => $brand,
            ]);
        }
    }
}
