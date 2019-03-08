<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

use App\BotellaLicor;
use App\Consulta;

class ConsultasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $citys = ["Bogota", "Medellín", "Cali", "Boyaca"];
        $codigos = DB::table('alc_botellaslicor')->pluck('codigo_b');

        $faker = Faker::create();

    	for($i=0;$i<30;$i++){
            $codigo_bar = $faker->randomElement($codigos);
            $botellalicor = BotellaLicor::whereCodigo_b($codigo_bar)->first();

            $consulta = new Consulta;
            $consulta->id_botella = $codigo_bar;
            $consulta->ciudad = $faker->randomElement($citys);
            $consulta->detalle = "";
            $consulta->created_at = $faker->dateTimeBetween($startDate = '-2 years', $endDate = 'yesterday');
            $consulta->save();

            $botellalicor->n_consultas++;
            $botellalicor->save();
            $botellalicor = BotellaLicor::whereCodigo_b($codigo_bar)->first();

        }
    }
}
