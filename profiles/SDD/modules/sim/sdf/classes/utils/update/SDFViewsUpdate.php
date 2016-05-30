<?php

class SDFViewsUpdate extends SDFBaseUpdate {

    public function validate() {
        if (!$this->requireModule('views')) {
            $e = SDFStr::get('EXCEPTION_UPDATE_MODULE_NOT_FOUND', array(
                '!name' => 'Views', '!module' => 'views'
            ));
            throw new SDFUpdateException($e);
            return FALSE;
        }

        if (!$this->requireModule('views_ui')) {
            $e = SDFStr::get('EXCEPTION_UPDATE_MODULE_NOT_FOUND', array(
                '!name' => 'Views', '!module' => 'views_ui'
            ));
            throw new SDFUpdateException($e);
            return FALSE;
        }

        if (!$this->requireFolder('views')) {
            $e = SDFStr::get('EXCEPTION_UPDATE_FOLDER_NOT_FOUND', array(
                '!name' => 'Views', '!folder' => 'views'
            ));
            throw new SDFUpdateException($e);
            return FALSE;
        }

        return TRUE;
    }

    public function update() {
        $path = $this->getUpdatePath('views');
        $dir = $this->scanDir('views');
        if (empty($dir)) {
            $e = SDFStr::get('EXCEPTION_UPDATE_FOLDER_NO_FILE', array(
                '!name' => 'Views', '!folder' => 'views'
            ));
            throw new SDFUpdateException($e);
        }
        foreach ($dir as $file) {
            $fullpath = $path . $file;
            // Read views object content.
            $content = file_get_contents($fullpath);
            if (empty($content)) {
                $e = SDFStr::get('EXCEPTION_UPDATE_CONTENT_EMPTY', array(
                    '!name' => 'Views', '!file' => $file
                ));
                throw new SDFUpdateException($e);
            }
            $view = '';
            views_include('view');
            eval($content);
            /* @var $view view */
            $view->update();
            $view->init_display();
            $view->save();
            views_ui_cache_set($view);
        }
    }

}
