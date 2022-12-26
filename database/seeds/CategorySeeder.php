<?php

use App\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create(['name' => 'ABRAZADERAS DE ALAMBRE', 'image' => 'images/category/Imagen_232.png']);
        Category::create(['name' => 'ACCESORIOS DE BRONCE FUNDIDOS P/AGUA', 'image' => 'images/category/Imagen_228.png']);
        Category::create(['name' => 'ACCESORIOS FUNDIDOS PARA GAS, MANIJA GAS', 'image' => 'images/category/Imagen_230.png']);
        Category::create(['name' => 'ACCESORIOS TRAFILADOS DE BRONCE P/ AGUA', 'image' => 'images/category/Imagen_229.png']);
        Category::create(['name' => 'ACCESORIOS TRAFILADOS P/GAS', 'image' => 'images/category/Imagen_231.png']);
        Category::create(['name' => 'ACOPLES RÁPIDOS DE COMPRESIÓN', 'image' => 'images/category/Imagen_233.png']);
        Category::create(['name' => 'ANODOS DE MAGNESIO PARA TERMOTANQUE', 'image' => 'images/category/Grupo_3249.png']);
        Category::create(['name' => 'ARANDELAS: FIBRA, GOMA, PVC, P/TANQUE', 'image' => 'images/category/Imagen_262.png']);
        Category::create(['name' => 'ARTÍCULOS Y ADAPTACIONES P/PLOMO', 'image' => 'images/category/Imagen_262.png']);
        Category::create(['name' => 'BOTONES P/DEPÓSITOS DE PARED PVC Y BCE-CROMO-RESORTES', 'image' => 'images/category/Imagen_264.png']);
        Category::create(['name' => 'BOYAS: COBRE, TERGOPOL, PVC, DESBORCOMPLY SOLAS', 'image' => 'images/category/Imagen_263.png']);
        Category::create(['name' => 'BRAZOS PARA DEPÓSITOS, BALANCINES, LLUVIA', 'image' => 'images/category/Imagen_261.png']);
    }
}
