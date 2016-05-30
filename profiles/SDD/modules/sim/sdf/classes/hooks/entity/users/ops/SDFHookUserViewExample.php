<?php

class SDFHookUserViewExample extends SDFHookUserViewOp {

    public function setup() {
        $this->addTaskByName('view_example');
    }

}