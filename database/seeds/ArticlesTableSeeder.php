<?php

use App\Article;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ArticlesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('articles')->delete();
        Article::create(array('headline' => 'Comienza la primera edición de la maratón del PDM', 'body' => 'La primera edición contará con más de 500 corredores, con premios de hasta 1000 euros. Si está interesado, contacta con el PDM para inscribirte.', 'img' => base64_encode('img/news/maraton.png')));
        Article::create(array('headline' => 'Plan local de instalaciones y equipamientos deportivos', 'body' => 'El Patronato Deportivo Municipal ya cuenta con el primer borrador del Plan local de Instalaciones y Equipamientos Deportivos, de obligado cumplimiento según lo dispuesto en el Plan Director de Instalaciones y Equipamientos Deportivos de Andalucía, aprobado por la Junta de Andalucía.', 'img' => base64_encode('img/news/planlocal.png')));
    }
}
