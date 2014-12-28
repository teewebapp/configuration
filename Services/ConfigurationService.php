<?php

namespace Tee\Configuration\Services;

use Tee\Configuration\Models\Configuration;

class ConfigurationService
{
    public function get($name)
    {
        $model = Configuration::where('name', '=', $name)->first();
        if($model)
            return $model->value;
    }

    public function listSection()
    {
        $sections = [];

        $basicSection = new ConfigurationSection('Configurações Básicas');
        $basicSection->add('site.name', 'Nome do Síte');
        $basicSection->add('site.telephone', 'Telefone');
        $basicSection->add('site.address', 'Endereço');
        $basicSection->add('site.email', 'Email');

        $sections[] = $basicSection;

        return $sections;
    }
}