<?php

use App\Section;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SectionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sections')->delete();
        Section::create(array('section' => '10:00-11:30', 'field_id' => 1));
        Section::create(array('section' => '11:30-13:00', 'field_id' => 1));
        Section::create(array('section' => '16:00-17:30', 'field_id' => 1));
        Section::create(array('section' => '17:30-19:00', 'field_id' => 1));
        Section::create(array('section' => '19:00-20:30', 'field_id' => 1));
        Section::create(array('section' => '20:30-22:00', 'field_id' => 1));

        Section::create(array('section' => '10:00-11:30', 'field_id' => 2));
        Section::create(array('section' => '11:30-13:00', 'field_id' => 2));
        Section::create(array('section' => '16:00-17:30', 'field_id' => 2));
        Section::create(array('section' => '17:30-19:00', 'field_id' => 2));
        Section::create(array('section' => '19:00-20:30', 'field_id' => 2));
        Section::create(array('section' => '20:30-22:00', 'field_id' => 2));

        Section::create(array('section' => '10:00-11:00', 'field_id' => 3));
        Section::create(array('section' => '11:00-12:00', 'field_id' => 3));
        Section::create(array('section' => '12:00-13:00', 'field_id' => 3));
        Section::create(array('section' => '16:00-17:00', 'field_id' => 3));
        Section::create(array('section' => '17:00-18:00', 'field_id' => 3));
        Section::create(array('section' => '18:00-19:00', 'field_id' => 3));
        Section::create(array('section' => '19:00-20:00', 'field_id' => 3));
        Section::create(array('section' => '20:00-21:00', 'field_id' => 3));
        Section::create(array('section' => '21:00-22:00', 'field_id' => 3));

        Section::create(array('section' => '10:00-11:00', 'field_id' => 4));
        Section::create(array('section' => '11:00-12:00', 'field_id' => 4));
        Section::create(array('section' => '12:00-13:00', 'field_id' => 4));
        Section::create(array('section' => '16:00-17:00', 'field_id' => 4));
        Section::create(array('section' => '17:00-18:00', 'field_id' => 4));
        Section::create(array('section' => '18:00-19:00', 'field_id' => 4));
        Section::create(array('section' => '19:00-20:00', 'field_id' => 4));
        Section::create(array('section' => '20:00-21:00', 'field_id' => 4));
        Section::create(array('section' => '21:00-22:00', 'field_id' => 4));

        Section::create(array('section' => '10:00-11:30', 'field_id' => 5));
        Section::create(array('section' => '11:30-13:00', 'field_id' => 5));
        Section::create(array('section' => '16:00-17:30', 'field_id' => 5));
        Section::create(array('section' => '17:30-19:00', 'field_id' => 5));
        Section::create(array('section' => '19:00-20:30', 'field_id' => 5));
        Section::create(array('section' => '20:30-22:00', 'field_id' => 5));

        Section::create(array('section' => '10:00-11:30', 'field_id' => 6));
        Section::create(array('section' => '11:30-13:00', 'field_id' => 6));
        Section::create(array('section' => '16:00-17:30', 'field_id' => 6));
        Section::create(array('section' => '17:30-19:00', 'field_id' => 6));
        Section::create(array('section' => '19:00-20:30', 'field_id' => 6));
        Section::create(array('section' => '20:30-22:00', 'field_id' => 6));
    }
}
