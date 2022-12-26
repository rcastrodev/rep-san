<?php

use App\Content;
use Illuminate\Database\Seeder;

class ContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /** Home  */
        /** Slider */
        for ($i=0; $i <= 2; $i++) { 
            Content::create([
                'section_id' => 1,
                'order'     => 'AA',
                'image'     => 'images/home/Trazado_8560.svg',
                'content_1' => 'ACCESORIOS EN BRONCE',
                'content_2' => 'PARA AGUA Y GAS',
            ]);
        }
        Content::create([
            'section_id'    => 2,
            'image'         => 'images/home/Grupo_3363.png',
        ]);

        Content::create([
            'section_id' => 3,
            'order'     => 'AA',
            'image'     => 'images/home/Grupo_3308.png',
            'content_1' => '<p>Nos dedicamos a la fabricación integral de artículos sanitarios en bronce para agua y gas y distribución de la más amplia variedad de productos sanitarios en goma, plásticos y diversos materiales.</p>',
        ]);

        /** Fin home page */

        /** Empresa  */
        Content::create([
            'section_id' => 4,
            'image' => 'images/company/2.png',
            'content_1' => 'NUESTRA EMPRESA',
            'content_2' => '<p>Con vasta experiencia dentro del rubro y la intención de proveer con calidad y dedicación a nuestros clientes, nace en el año 1983, REPSAN S.R.L.</p>
            <p>Desde entonces hemos seguido una política de constante crecimiento y desarrollo en busca de una permanente mejora en la calidad de nuestros productos en bronce y una mayor amplitud en la distribución de artículos de diversos materiales.</p>
            <p>Nuestra planta nos permite llevar a cabo la fabricación integral de productos en bronce, realizando procesos de fundición basados en distintas tecnologías, mecanizando y procesando los diferentes productos para que la mercadería llegue a sus manos en óptimas condiciones.</p>
            <p>En la actualidad, luego de un largo recorrido seguimos apostando a la evolución de la firma y a la permanente mejora en la atención que usted se merece, razón por la cual establecemos este puente que representa una agilización y una mejora en la comunicación entre usted y nosotros.</p>
            '
        ]);
        /** Descargas  */
        Content::create([
            'section_id' => 5,
            'order'     => 'AA',
            'image'     => 'images/donwloads/Hansa-faucet-Hansamix-chrome,-Hansaeco-Top,-with-Hansamix-waste.png',
            'content_1' => 'CATÁLOGO SANITARIOS',
        ]);

        Content::create([
            'section_id' => 5,
            'order'     => 'BB',
            'image'     => 'images/donwloads/nitrile-o-ring.png',
            'content_1' => 'CATÁLOGO ORINGS',
        ]);

        Content::create([
            'section_id' => 5,
            'order'     => 'CC',
            'image'     => 'images/donwloads/9133.png,-with-Hansamix-waste.png',
            'content_1' => 'CATÁLOGO ACCESORIOS',
        ]);

        Content::create([
            'section_id' => 6,
            'content_1' => 'Para mayor información, no dude en contactarse con nosotros mediante el siguiente formulario, o a través de nuestras vías de comunicación.',
        ]);
    }
}