<?php
namespace Tee\Configuration\Services;

use Tee\Configuration\Models\Configuration;

class ConfigurationSectionItem
{
    public $name;
    public $title;

    public function __construct($name, $title)
    {
        $this->name = $name;
        $this->title = $title;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getModel()
    {
        $model = Configuration::where('name', '=', $this->name)->first();
        if($model)
            return $model;
        else {
            $model = new Configuration();
            $model->name = $this->name;
            return $model;
        }
    }

    public function getValue()
    {
        return $this->getModel()->value;
    }
}