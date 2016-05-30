<?php

abstract class SDFHookNodeViewOp extends SDFHookEntityViewOp {

    protected function createTask($name) {
        $path = "sdf/classes/hooks/entity/nodes/tasks";
        switch ($name) {
            case 'view_example';
            require_once $path . '/SDFHookNodeViewTaskExample.php';
            return new SDFHookNodeViewTaskExample();
            break;

            default:
                return null;
        }
    }
}