<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ProductTest extends TestCase
{
    public function testBasicExample()
    {
        $this->visit('productos')
             ->click('Ingresar Producto')
             ->seePageIs('productos/create')
             ->see('Tipo Licor')
             ->type('Whiskey','tipo')
             ->type('Chivas 18 anos','descripcion')
             ->type('Chivas','marca')
             ->type('89887845','codigo_b')
             ->press('Ingresar Producto')
             ->see('Chivas 18 anos')
             ->seeInDatabase('alc_botellaslicor',[
                'tipo' => 'Whiskey',
                'descripcion' => 'Chivas 18 anos'
                ]);

    }
}
