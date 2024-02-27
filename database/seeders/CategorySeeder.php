<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\CategoryMst;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'id' => 1,
                'category_name' => 'Divyang(दिव्यांग)',
                'initial' => 'Divyang(दिव्यांग)',
            ],

            [
                'id' => 2,
                'category_name' => 'Leprosy(कुष्ठरोग)',
                'initial' => 'Leprosy(कुष्ठरोग)',
            ],

            [
                'id' => 3,
                'category_name' => 'Senior Citizen(ज्येष्ठ नागरिक)',
                'initial' => 'Senior Citizen(ज्येष्ठ नागरिक)',
            ],
            [
                'id' => 4,
                'category_name' => 'Women and Child Walfare(महिला आणि बालकल्याण)',
                'initial' => 'Women and Child Walfare(महिला आणि बालकल्याण)',
            ],
        ];

        foreach ($categories as $category) {
            CategoryMst::updateOrCreate([
                'id' => $category['id']
            ], [
                'id' => $category['id'],
                'category_name' => $category['category_name'],
                'initial' => $category['initial']
            ]);
        }
    }
}