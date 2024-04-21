<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ServicesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Service::create([
            'language_id'=>2,
            'name'=>'4 Persons',

        ]);
        Service::create([
            'language_id'=>2,
            'name'=>'Room Services',

        ]);
        Service::create([
            'language_id'=>2,
            'name'=>'Kingsize Bed',

        ]);
        Service::create([
            'language_id'=>2,
            'name'=>'TV',

        ]);

        Service::create([
            'language_id'=>1,
            'name'=>'4 أشخاص',

        ]);
        Service::create([
            'language_id'=>1,
            'name'=>'خدمة الغرف ',

        ]);
        Service::create([
            'language_id'=>1,
            'name'=>'أسرة ذو حجم كبير',

        ]);
        Service::create([
            'language_id'=>1,
            'name'=>'تلفاز',

        ]);
        Service::factory(10)->create();
    }
}
