<?php

namespace Database\Seeders;

use App\Models\Nationalitiev2;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NationalitiesSeederTable extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('nationalitiev2s')->delete();

        $nationalities = ['morrocan', 'algerian', 'frensh', 'afghan', 'italian', 'espagnol'];
        foreach($nationalities as $nationalitie){
            Nationalitiev2::create(['name' => $nationalitie]);
        }
    }
}
