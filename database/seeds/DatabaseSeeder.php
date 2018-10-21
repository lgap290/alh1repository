<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$faker = Faker::create();
    	for($i=0;$i<15;$i++){
	    	\DB::table('alc_usuarios')->insert(array(
	    		'Nombre' => $faker->name,
				'Usuario' => $faker->unique()->email,
				'Password' => $faker->randomNumber($nbDigits = NULL)
	    	));

	    	\DB::table('alc_clientes')->insert(array(
	    		'Nombre' => $faker->name,
				'Ubicacion' => $faker->address,
				'InfoCelular' => $faker->phoneNumber
	    	));

	    	\DB::table('alc_botella')->insert(array(
	    		'Descripcion' => $faker->name,
				'Marca' => $faker->company,
				'Codigo' => $faker->isbn10
	    	));


	   }
        // $this->call(UsersTableSeeder::class);
    }
}
