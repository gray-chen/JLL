<?php

abstract class SDFHookTermViewOp extends SDFHookEntityViewOp {

    protected function createTask($name) {
        $path = "sdf/classes/hooks/entity/terms/tasks";
        switch ($name) {
            case 'view_example';
                require_once $path . '/SDFHookTermViewTaskExample.php';
                return new SDFHookTermViewTaskExample();
                break;

            default:
                return null;
        }
    }
}
