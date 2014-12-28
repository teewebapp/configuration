<?php

namespace Tee\Configuration\Controllers\Admin;

use Tee\Admin\Controllers\AdminBaseController;

use Tee\Configuration\Models\Configuration;
use View, Redirect, Validator, URL, Input;

use Tee\System\Breadcrumbs;

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
        return \Tee\Config::listSection();
    }
    
}
