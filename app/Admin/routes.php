<?php

Route::get('', ['as' => 'admin.dashboard', function () {
	$content = 'Define your dashboard here. Okay';
	return AdminSection::view($content, 'Dashboard');
}]);

