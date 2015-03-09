<?php

namespace Tee\Configuration\Models;

use Tee\System\Models\Model;
use Tee\System\Traits\CurrentSiteTrait;
use URL;

class Configuration extends Model {
    use CurrentSiteTrait;

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