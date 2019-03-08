<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\BotellaLicor;
use App\TapaBotellaLicor;

class BotellasLicorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $tipo = array("Aguardiente", "Ron");
        $marca = array("Aguardiente Antioqueño", "Ron Medellin Añejo");
        $descripcion = array(
            0 => array(
                "Aguardiente Antioqueño Tradicional",
                "Aguardiente Antioqueño Sin Azúcar",
                "Aguardiente Antioqueño 24° Sin Azúcar",
                "Aguardiente Antioqueño Real Sin Azúcar Adicionado"
            ),
            1 => array(
                "Ron Medellín Dorado Botella Vidrio 375 ML",
                "Ron Medellín Dorado Botella Vidrio 750 ML",
                "Ron Medellín Extra Añejo 3 años Tetrapack 260 ML",
                "Ron Medellín Extra Añejo 3 años Botella Vidrio 375 ML",
                "Ron Medellín Extra Añejo 3 años Botella Vidrio 750 ML",
                "Ron Medellín Extra Añejo 3 años Botella Vidrio 1000 ML",
                "Ron Medellín Extra Añejo 3 años Tetrapack 1050 ML",
                "Ron Medellín Extra Añejo 3 años Botella Vidrio 2000 ML",
                "Ron Medellín Extra Añejo 5 años Botella Vidrio 375 ML",
                "Ron Medellín Extra Añejo 5 años Botella Vidrio 750 ML",
                "Ron Medellín Extra Añejo 8 años Botella Vidrio 375 ML",
                "Ron Medellín Extra Añejo 8 años Botella Vidrio 750 ML",
                "Ron Medellín Extra Añejo 12 años Botella Vidrio 750 ML",
                "Medellín Crema de Ron Botella Vidrio 375 ML",
                "Medellín Crema de Ron Botella Vidrio 750 ML"
            )
        );
        //$codigos = DB::table('alc_botellaslicor')->pluck('codigo_b');

        $faker = Faker::create();

    	for($i=0;$i<100;$i++){

            //print($faker->numberBetween($min = 0, $max = 1));
            $id_array = $faker->numberBetween($min = 0, $max = 1);
            $dateRandom = $faker->dateTimeBetween($startDate = '-2 years', $endDate = 'yesterday');
            
            $botellalicor = new BotellaLicor;
            $tapabotellalicor = new TapaBotellaLicor;
    
            $tapabotellalicor->codigo_qr = 1000+$i;
            $tapabotellalicor->save();
    
            $botellalicor->tipo = $tipo[$id_array];
            $botellalicor->descripcion = $faker->randomElement($descripcion[$id_array]);
            $botellalicor->marca = $marca[$id_array];
            $botellalicor->codigo_b = 1000+$i;
            $botellalicor->id_tapa = $tapabotellalicor->id;
            
            $botellalicor->save();
        }
    }
}
