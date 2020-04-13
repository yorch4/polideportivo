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
        Facilitie::create(array('name' => 'Gimnasio', 'description' => 'Contamos con unas instalaciones totalmente reformadas, equipadas con alta tecnología y un equipo de expertos profesionales ideal para que la práctica del deporte sea un privilegio al alcance de todos.', 'timetable' => 'Lunes a Sábados de 8:00 a 14:00 y de 16:00 a 22:00', 'normal_price' => '30', 'sub_price' => '20'));
        Facilitie::create(array('name' => 'Piscinas', 'description' => 'Podrás realizar nado libre y entrenar a tu aire sin depender de grupos, horarios o niveles. Además, por el mismo precio podrás relajarte en el área de spa que cuenta con un jacuzzi, un baño turco y una sauna finlandesa. Recuerda que necesitarás chanclas y bañador. El uso del gorro es obligatorio y en nuestra propia tienda te damos la facilidad de poder adquirirlo.', 'timetable' => 'Lunes a Viernes de 9:00 a 12:00 y de 17:00 a 20:00', 'normal_price' => '25', 'sub_price' => '15'));
    }
}
