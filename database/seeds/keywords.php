<?php

use Illuminate\Database\Seeder;

class keywords extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $k = [
            'bunga mawar',
            'bunga melati',
            'bunga matahari',
            'bunga rose',
            'bunga anggrek',
            'bunga kamboja'
            ];
        foreach ($k as $key => $value) {
            App\Keyword::firstOrCreate(['keyword' => $value]);
        }

    }
}
