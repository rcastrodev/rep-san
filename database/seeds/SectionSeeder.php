<?php

use App\Page;
use App\Section;
use Illuminate\Database\Seeder;

class SectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /** Home */
        Section::create(['page_id' => Page::where('name', 'inicio')->first()->id, 'name' => 'section_1']);
        Section::create(['page_id' => Page::where('name', 'inicio')->first()->id, 'name' => 'section_2']);
        Section::create(['page_id' => Page::where('name', 'inicio')->first()->id, 'name' => 'section_3']);
        /** Empresa */
        Section::create(['page_id' => Page::where('name', 'empresa')->first()->id, 'name' => 'section_1']);
        /** Descargas */
        Section::create(['page_id' => Page::where('name', 'descargas')->first()->id, 'name' => 'section_1']);
        /** Contacto */
        Section::create(['page_id' => Page::where('name', 'contacto')->first()->id, 'name' => 'section_1']);
    }
}
