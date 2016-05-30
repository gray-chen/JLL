<?php

require_once 'sdf/classes/utils/update/SDFBaseUpdate.php';
require_once 'sdf/classes/exceptions/SDFUpdateException.php';

class SDFUpdateFactory extends SDFFactory {

    protected $version;

    /**
     * Create an Update instance.
     *
     * @param string $name
     * @throws SDFUpdateException
     *
     * @return SDFBaseUpdate
     */
    public function createUpdate($name) {
        $path = 'sdf/classes/utils/update/';
        switch ($name) {
            case SDFConst::UPDATE_ENTITY:
                require_once $path . 'SDFEntityUpdate.php';
                return new SDFEntityUpdate($this->module, $this->version);
                break;
            case SDFConst::UPDATE_VIEWS:
                require_once $path . 'SDFViewsUpdate.php';
                return new SDFViewsUpdate($this->module, $this->version);
                break;
            case SDFConst::UPDATE_DB:
                require_once $path . 'SDFDBUpdate.php';
                return new SDFDBUpdate($this->module, $this->version);
                break;
            case SDFConst::UPDATE_PHP:
                require_once $path . 'SDFPHPUpdate.php';
                return new SDFPHPUpdate($this->module, $this->version);
                break;
            default:
                $error = SDFStr::get('EXCEPTION_UPDATE_INSTANCE_NOT_FOUND', array(
                    '!name' => $name
                ));
                throw new SDFUpdateException($error);
                return NULL;
        }
    }

    public function setModule($module) {
        $this->module = $module;
    }

    public function setVersion($version) {
        $this->version = $version;
    }

}
