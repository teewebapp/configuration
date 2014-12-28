<?php
namespace Tee\Configuration\Services;

use Tee\Configuration\Services\ConfiguratonSectionItem;


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