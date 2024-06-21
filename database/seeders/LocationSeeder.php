<?php

namespace Database\Seeders;


use App\Models\Location;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $locations = [
            ['name' => 'AF Eindhoven', 'address' => '123 Hoofdstraat, Eindhoven', 'city' => 'Eindhoven', 'postal_code' => '5611 HZ'],
            ['name' => 'AF Rotterdam', 'address' => '456 Oostplein, Rotterdam', 'city' => 'Rotterdam', 'postal_code' => '3011 LH'],
            ['name' => 'AF Amsterdam', 'address' => '789 Damrak, Amsterdam', 'city' => 'Amsterdam', 'postal_code' => '1012 LM'],
            ['name' => 'AF Utrecht', 'address' => '321 Neude, Utrecht', 'city' => 'Utrecht', 'postal_code' => '3512 JH'],
            ['name' => 'AF Tilburg', 'address' => '654 Heuvelring, Tilburg', 'city' => 'Tilburg', 'postal_code' => '5038 CN'],
            ['name' => 'AF Groningen', 'address' => '987 Grote Markt, Groningen', 'city' => 'Groningen', 'postal_code' => '9712 CP'],
            ['name' => 'AF Breda', 'address' => '159 Grote Markt, Breda', 'city' => 'Breda', 'postal_code' => '4811 DZ'],
            ['name' => 'AF Nijmegen', 'address' => '753 Grote Markt, Nijmegen', 'city' => 'Nijmegen', 'postal_code' => '6511 XV'],
            ['name' => 'AF Apeldoorn', 'address' => '357 Marktplein, Apeldoorn', 'city' => 'Apeldoorn', 'postal_code' => '7311 LZ'],
            ['name' => 'AF Haarlem', 'address' => '951 Grote Markt, Haarlem', 'city' => 'Haarlem', 'postal_code' => '2011 RD']
        ];

        foreach ($locations as $location) {
            Location::create($location);
        }
    }
}
