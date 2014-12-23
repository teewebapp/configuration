<?php

namespace Tee\Configuration;
use Route, Config;

Route::group(['prefix' => 'admin'], function() {
    Route::resource('configuration', __NAMESPACE__.'\Controllers\Admin\ConfigurationController',
        ['except' => array('show', 'create', 'edit')]
    );
});