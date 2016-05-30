<?php

abstract class SDFHookUserViewOp extends SDFHookEntityViewOp {

    protected function createTask($name) {
        $path = "sdf/classes/hooks/entity/users/tasks";
        switch ($name) {
            case 'view_example';
                require_once $path . '/SDFHookUserViewTaskExample.php';
                return new SDFHookUserViewTaskExample();
                break;

            default:
                return null;
        }
    }
}
