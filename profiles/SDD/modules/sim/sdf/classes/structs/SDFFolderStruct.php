<?php

class SDFFolderStruct extends SDFStruct {

    /**
     * The root folder that contains the module.
     *
     * @var string
     */

    protected $root;

    public function __construct() {
        $this->root = SDFConst::ROOT_PROJECT;
    }

    public function setRoot($root) {
        $this->root = $root;
    }

    protected function requirement() {
        // Root must exist.
        if (!$this->rootExists()) {
            $e = SDFStr::get('EXCEPTION_PROJECT_FOLDER_NOT_FOUND', array('!folder' => $this->root));
            throw new SDFStructException($e);
        }
        // Module must be specified.
        if (empty($this->module)) {
            $e = SDFStr::get('EXCEPTION_PROJECT_MODULE_NOT_SET');
            throw new SDFStructException($e);
        }
    }

    /**
     * Create complete folder structure for the module.
     *
     * @throws SDFStructException
     */
    public function createStruct() {
        $this->requirement();

        $folders = array(
            // Module folder
            $this->module,
            // Classes folders
            $this->module . '/classes',
            $this->module . '/classes/consts',
            $this->module . '/classes/entities',
            $this->module . '/classes/entities/base',
            $this->module . '/classes/entities/nodes',
            $this->module . '/classes/entities/terms',
            $this->module . '/classes/entities/users',
            $this->module . '/classes/business',
            $this->module . '/classes/business/nodes',
            $this->module . '/classes/business/terms',
            $this->module . '/classes/business/users',
            $this->module . '/classes/exceptions',
            $this->module . '/classes/factories',
            $this->module . '/classes/hooks',
            $this->module . '/classes/hooks/core',
            $this->module . '/classes/hooks/block',
            $this->module . '/classes/hooks/block/factories',
            $this->module . '/classes/hooks/block/blocks',
            $this->module . '/classes/hooks/block/ops',
            $this->module . '/classes/hooks/form',
            $this->module . '/classes/hooks/form/factories',
            $this->module . '/classes/hooks/form/forms',
            $this->module . '/classes/hooks/form/alters',
            $this->module . '/classes/hooks/entity',
            $this->module . '/classes/hooks/entity/base',
            $this->module . '/classes/hooks/entity/factories',
            $this->module . '/classes/hooks/entity/nodes',
            $this->module . '/classes/hooks/entity/nodes/ops',
            $this->module . '/classes/hooks/entity/nodes/tasks',
            $this->module . '/classes/hooks/entity/terms',
            $this->module . '/classes/hooks/entity/terms/ops',
            $this->module . '/classes/hooks/entity/terms/tasks',
            $this->module . '/classes/hooks/entity/users',
            $this->module . '/classes/hooks/entity/users/ops',
            $this->module . '/classes/hooks/entity/users/tasks',
            $this->module . '/classes/utils',
            // Includes folders
            $this->module . '/includes',
            $this->module . '/includes/common',
            $this->module . '/includes/admin',
            $this->module . '/includes/forms',
            $this->module . '/includes/pages/',
            $this->module . '/includes/strings',
            $this->module . '/includes/temp',
            $this->module . '/includes/tests',
            $this->module . '/includes/themes',
            $this->module . '/includes/themes/templates',
            $this->module . '/includes/themes/functions',
            $this->module . '/includes/js',
            $this->module . '/includes/css',
            // Unit test folder
            $this->module . '/tests',
            // Update folder
            $this->module . '/updates',
            // Sub module folder
            $this->module . '/modules',
        // TODO how to create complete folders for sub modules.
        );
        foreach ($folders as $folder) {
            $this->createFolder($folder);
        }
    }

    private function rootExists() {
        return file_exists($this->root);
    }

    private function createFolder($name) {
        $folder = SDFConst::ROOT_PROJECT . '/' . $name;
        if (file_exists($folder)) {
            return TRUE;
        }
        $ok = mkdir($folder);
        if (!$ok) {
            $e = SDFStr::get('EXCEPTION_PROJECT_FOLDER_CREATION_FAILURE', array('!folder' => $folder));
            throw new SDFStructException($e);
        }
        return TRUE;
    }

}
