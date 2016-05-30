<?php

abstract class SDFClassStruct extends SDFStruct {

    /**
     * Class prefix
     *
     * @var string
     */
    protected $classPrefix;

    public function setClassPrefix($prefix) {
        $this->classPrefix = $prefix;
    }

    protected function requirement() {
        if (empty($this->module)) {
            $error = SDFStr::get('EXCEPTION_PROJECT_MODULE_NOT_SET');
            throw new SDFStructException($error);
        }

        if (empty($this->classPrefix)) {
            $error = SDFStr::get('EXCEPTION_PROJECT_CLASS_PREFIX_NOT_SET');
            throw new SDFStructException($error);
        }
    }
}