<?php

namespace Tee\Configuration\Controllers\Admin;

use Tee\Admin\Controllers\AdminBaseController;

use Tee\Configuration\Models\Configuration;
use View, Redirect, Validator, URL, Input;

use Tee\System\Breadcrumbs;

class ConfigurationSectionItem {
    public $name;
    public $title;

    public function __construct($name, $title) {
        $this->name = $name;
        $this->title = $title;
    }

    public function getName() {
        return $this->name;
    }

    public function getTitle() {
        return $this->title;
    }

    public function getModel() {
        $model = Configuration::where('name', '=', $this->name)->first();
        return $model;
    }

    public function getValue() {
        return $this->getModel()->value;
    }
}

class ConfigurationSection {
    private $items;
    private $title;

    public function __construct($title) {
        $this->title = $title;
    }

    public function add($name, $title) {
        $this->items[] = new ConfigurationSectionItem($name, $title);
    }

    public function getItems() {
        return $this->items;
    }

    public function getTitle() {
        return $this->title;
    }
}

class ConfigurationController extends AdminBaseController {

    public function index() {
        $sections = $this->listSection();

        View::share('pageTitle', 'Configurações');

        Breadcrumbs::addCrumb(
            'Configurações',
            URL::route("admin.configuration.index")
        );

        return View::make(
            'configuration::admin.configuration.index',
            compact('sections')
        );
    }

    public function update() {
        $sections = $this->listSection();
        $data = Input::get('Configuration');
        foreach($sections as $section) {
            foreach ($section->getItems() as $item) {
                $model = $item->getModel();
                if(array_key_exists($item->getName(), $data)) {
                    $model->value = $data[$item->getName()];
                    $model->save();
                }
            }
        }
        return Redirect::route("admin.configuration.index", [
            'successMessage' => 'Configurações alteradas com sucesso!'
        ]);
    }

    public function listSection() {
        $sections = [];

        $basicSection = new ConfigurationSection('Configurações Básicas');
        $basicSection->add('site.name', 'Nome do Síte');
        $basicSection->add('site.telephone', 'Telefone');
        $basicSection->add('site.address', 'Endereço');

        $sections[] = $basicSection;

        return $sections;
    }
    
}
