<?php

class SDFEntityUpdate extends SDFBaseUpdate {

    public function validate() {
        if (!$this->requireModule('bundle_copy')) {
            $e = SDFStr::get('EXCEPTION_UPDATE_MODULE_NOT_FOUND', array(
                '!name' => 'Entity', '!module' => 'bundle_copy'
            ));
            throw new SDFUpdateException($e);
            return FALSE;
        }

        if (!$this->requireFolder('entity')) {
            $e = SDFStr::get('EXCEPTION_UPDATE_FOLDER_NOT_FOUND', array(
                '!name' => 'Entity', '!folder' => 'entity'
            ));
            throw new SDFUpdateException($e);
            return FALSE;
        }

        return TRUE;
    }

    public function update() {
        $dir = $this->scanDir('entity');
        if (empty($dir)) {
            $e = SDFStr::get('EXCEPTION_UPDATE_FOLDER_NO_FILE', array(
                '!name' => 'Entity', '!file' => $file
            ));
            throw new SDFUpdateException($e);
        }
        $path = $this->getUpdatePath('entity');
        foreach ($dir as $file) {
            $fullfile = $path . $file;
            $content = file_get_contents($fullfile);
            if (empty($content)) {
                $e = SDFStr::get('EXCEPTION_UPDATE_CONTENT_EMPTY', array(
                    '!name' => 'Entity', '!file' => $file
                ));
                throw new SDFUpdateException($e);
            }
            $id = 'bundle_copy_import';
            $state = array();
            $state['values']['macro'] = $content;
            drupal_form_submit($id, $state);
        }
    }

}
