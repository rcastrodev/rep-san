<?php

use App\VariableProduct;
use Illuminate\Database\Seeder;

class VariableProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(VariableProduct::class, 200)->create();
    }
}
