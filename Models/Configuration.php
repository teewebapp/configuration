<?php

namespace Tee\Configuration\Models;

use Tee\System\Models\Model;

use URL;

class Configuration extends Model {

	public static $rules = [
		'name' => 'required'
	];

	protected $fillable = [
        'name',
    ];

    public static function getAttributeNames() {
        return array(
            'name' => 'Nome',
        );
    }

    public function items() {
        return $this->hasMany(__NAMESPACE__.'\\ConfigurationItem', 'banner_id');
    }
}