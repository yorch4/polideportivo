<?php

use App\Facilitie;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FacilitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('facilities')->delete();
        Facilitie::create(array('name' => 'Gimnasio', 'description' => 'Aquí disfrutarás de esto', 'timetable' => 'Lunes a Sábados de 8:00 a 14:00 y de 16:00 a 10:00', 'normal_price' => '30', 'sub_price' => '20'));
        Facilitie::create(array('name' => 'Piscinas', 'description' => 'Aquí disfrutarás de esto', 'timetable' => 'Lunes a Viernes de 9:00 a 12:00 y de 17:00 a 20:00', 'normal_price' => '25', 'sub_price' => '15'));
    }
}
