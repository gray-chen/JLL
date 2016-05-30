<?php

require_once 'sdf/classes/hooks/base/SDFHook.php';

class SDFHookAdminPathAlter extends SDFHook {
	// Private property
	private $path;
	
	public function __construct(&$path) {
		// If the parameter is a reference variable,
		// use it as reference too.
		$this->path = &$path;
	}
	
	//Add custom view path to overlay in the webmaster menu. 2013/3/11 by MYJ
    public function invoke() {
    	$this->path['user-management'] = true;
    	$this->path['content-management'] = true;
    	$this->path['content-management/*'] = true;
    }

}
