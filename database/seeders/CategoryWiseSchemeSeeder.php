<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\CategoryWiseScheme;


class CategoryWiseSchemeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [

            [
                'id' => 1,
                'category_id' => '2,1',
                'scheme_id' => '1',
            ],

            [
                'id' => 2,
                'category_id' => '4,3,2,1',
                'scheme_id' => '2',
            ],

            [
                'id' => 3,
                'category_id' => '4,2,1',
                'scheme_id' => '3',
            ],

            [
                'id' => 4,
                'category_id' => '2,1',
                'scheme_id' => '4',
            ],

            [
                'id' => 5,
                'category_id' => '4',
                'scheme_id' => '5',
            ],

            [
                'id' => 6,
                'category_id' => '4',
                'scheme_id' => '6',
            ],

            [
                'id' => 7,
                'category_id' => '4',
                'scheme_id' => '7',
            ],

            [
                'id' => 8,
                'category_id' => '4',
                'scheme_id' => '8',
            ],

        ];

        foreach ($data as $row) {
            CategoryWiseScheme::updateOrCreate([
                'id' => $row['id']
            ], [
                'id' => $row['id'],
                'category_id' => $row['category_id'],
                'scheme_id' => $row['scheme_id']
            ]);
        }
    }
}