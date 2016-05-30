<?php

class SDFHookHomepageNodeForm extends SDFHookFormAlter {

    protected function setup() {
        $this->addAlterByName('homepage_alter');
    }

}