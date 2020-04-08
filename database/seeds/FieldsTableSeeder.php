<?php

use Illuminate\Database\Seeder;
use App\Field;

class FieldsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('fields')->delete();
        Field::create(array('game' => 'Fútbol 11', 'price' => 24.5, 'img' => base64_encode('img/fields/futbol11-1.jpg'), 'field_number' => 1));
        Field::create(array('game' => 'Fútbol 11', 'price' => 24.5, 'img' => base64_encode('img/fields/futbol11-2.jpg'), 'field_number' => 2));
        Field::create(array('game' => 'Fútbol 7', 'price' => 12, 'img' => base64_encode('img/fields/futbol7-1.jpg'), 'field_number' => 1));
        Field::create(array('game' => 'Fútbol 7', 'price' => 12, 'img' => base64_encode('img/fields/futbol7-2.jpg'), 'field_number' => 2));
        Field::create(array('game' => 'Pádel', 'price' => 7, 'img' => base64_encode('img/fields/padel-1.jpg'), 'field_number' => 1));
        Field::create(array('game' => 'Pádel', 'price' => 7, 'img' => base64_encode('img/fields/padel-2.jpg'), 'field_number' => 2));
    }
}
