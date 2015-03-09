<?php

namespace Tee\Configuration\Seeds;

use Tee\Configuration\Models\Configuration;
use Seeder, DB, Eloquent;

class ConfigurationTableSeeder extends Seeder {

    public function run() {
        Eloquent::unguard();

        Configuration::create(array(
            'id' => 1,
            'site_id' => currentSite()->id,
            'name' => 'site.name',
            'value' => 'Nome do síte',
        ));

        Configuration::create(array(
            'id' => 2,
            'site_id' => currentSite()->id,
            'name' => 'site.telephone',
            'value' => 'Telefone',
        ));

        Configuration::create(array(
            'id' => 3,
            'site_id' => currentSite()->id,
            'name' => 'site.address',
            'value' => 'Endereço',
        ));
    }

}