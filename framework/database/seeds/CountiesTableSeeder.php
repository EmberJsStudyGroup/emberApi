<?php

use Illuminate\Database\Seeder;

class CountiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('counties')->truncate();

        $counties = [
            'Bucuresti - Sector 1',
            'Bucuresti - Sector 2',
            'Bucuresti - Sector 3',
            'Bucuresti - Sector 4',
            'Bucuresti - Sector 5',
            'Bucuresti - Sector 6',
            'Alba',
            'Arad',
            'Arges',
            'Bacau',
            'Bihor',
            'Bistrita Nasaud',
            'Botosani',
            'Braila',
            'Brasov',
            'Buzau',
            'Calarasi',
            'Caras Severin',
            'Cluj',
            'Constanta',
            'Covasna',
            'Dambovita',
            'Dolj',
            'Galati',
            'Giurgiu',
            'Gorj',
            'Harghita',
            'Hunedoara',
            'Ialomita',
            'Iasi',
            'Ilfov',
            'Maramures',
            'Mehedinti',
            'Mures',
            'Neamt',
            'Olt',
            'Prahova',
            'Salaj',
            'Satu Mare',
            'Sibiu',
            'Suceava',
            'Teleorman',
            'Timis',
            'Vaslui',
            'Valcea',
            'Tulcea',
            'Vrancea'
        ];

        foreach ($counties as $oneRow) {
            \App\Models\County::create(['name' => $oneRow]);
        }
        //
    }
}
