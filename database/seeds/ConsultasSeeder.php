<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

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

    	for($i=0;$i<3456;$i++){

            DB::table('alc_consultas')->insert([
                'id_botella' => $faker->randomElement($codigos),
                'ciudad' => $faker->randomElement($citys),
                'created_at'=> $faker->dateTimeBetween($startDate = '-2 years', $endDate = 'yesterday')
            ]);
        }
    }
}
