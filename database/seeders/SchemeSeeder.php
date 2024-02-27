<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\SchemeMst;

class SchemeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $schemes = [
            [
                'id' => 1,
                'scheme_name' => 'Divyang Nondani Application',
                'scheme_marathi_name' => 'दिव्यांग नोंडणी अर्ज',

            ],

            [
                'id' => 2,
                'scheme_name' => 'Bus Concession Scheme',
                'scheme_marathi_name' => 'दिव्यांग व्यक्ती, जेष्ठ नागरिक व १८ वर्षाखालील विद्यार्थी बस भाडयात योजना',

            ],

            [
                'id' => 3,
                'scheme_name' => 'Education Scheme',
                'scheme_marathi_name' => 'शिक्षण योजना',

            ],

            [
                'id' => 4,
                'scheme_name' => 'Marriage Scheme',
                'scheme_marathi_name' => 'विवाह योजना',

            ],

            [
                'id' => 5,
                'scheme_name' => 'Sports Scheme',
                'scheme_marathi_name' => 'क्रीडा योजना',

            ],

            [
                'id' => 6,
                'scheme_name' => 'Women Sewing Scheme',
                'scheme_marathi_name' => 'महिला शिवणकाम योजना',

            ],

            [
                'id' => 7,
                'scheme_name' => 'Cancer Scheme',
                'scheme_marathi_name' => 'कर्करोग योजना',

            ],

            [
                'id' => 8,
                'scheme_name' => 'Vehicle Scheme',
                'scheme_marathi_name' => 'वाहन योजना',

            ],

        ];


        foreach ($schemes as $scheme) {
            SchemeMst::updateOrCreate([
                'id' => $scheme['id']
            ], [
                'id' => $scheme['id'],
                'scheme_name' => $scheme['scheme_name'],
                'scheme_marathi_name' => $scheme['scheme_marathi_name']
            ]);
        }
    }
}