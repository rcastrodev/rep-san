<?php

use App\Data;
use App\Company;
use Illuminate\Database\Seeder;

class DataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Data::create([
            'company_id'    => Company::first()->id,
            'address'       => 'Carlos Gardel 4445, B1874CLD Villa Dominico, Buenos Aires',
            'email'         => 'repsanar@yahoo.com.ar',
            'phone1'        => '+541142172800|+54 (11) 4217-2800',
            'phone2'        => '+541142172800|+54 (11) 4217-2800',
            'logo_header'   => 'images/data/LOGO_NUEVO TRANSPARENTE.png',
            'logo_footer'   => 'images/data/LOGO_NUEVO TRANSPARENTE.png'
        ]);
    }
}
