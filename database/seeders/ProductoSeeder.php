<?php

//namespace Database\Seeders;

//use Illuminate\Database\Console\Seeds\WithoutModelEvents;
//use Illuminate\Database\Seeder;
//use App\Models\Producto;

//class ProductoSeeder extends Seeder
//{
  //  /**
  //   * Run the database seeds.
 //    */
  //  public function run(): void
  //  {
  //      Producto::create(['codigo'=>'1A','nombre'=>'Chocolate','precio'=>1.50,'stock'=>5]);
 //       Producto::create(['codigo'=>'1B','nombre'=>'Galleta','precio'=>1.00,'stock'=>3]);
// //       Producto::create(['codigo'=>'2A','nombre'=>'Agua','precio'=>2.00,'stock'=>2]);
// //       Producto::create(['codigo'=>'2B','nombre'=>'Monster','precio'=>3.50,'stock'=>2]);
 //   }




namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Producto;

class ProductoSeeder extends Seeder
{
    public function run(): void
    {
        // Chocolate
        Producto::updateOrCreate(
            ['codigo' => '1A'], // busca por código
            [
                'nombre' => 'Chocolate',
                'precio' => 1.50,
                'stock' => 5
            ]
        );

        // Galleta
        Producto::updateOrCreate(
            ['codigo' => '1B'],
            [
                'nombre' => 'Galleta',
                'precio' => 1.00,
                'stock' => 3
            ]
        );

        // Refresco
        Producto::updateOrCreate(
            ['codigo' => '2A'],
            [
                'nombre' => 'Refresco',
                'precio' => 2.00,
                'stock' => 10
            ]
        );
    }
}




