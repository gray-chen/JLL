<?php

abstract class SDFHookNodeOp extends SDFHookEntityOp {

    protected function createTask($name) {
        $path = "sdf/classes/hooks/entity/nodes/tasks";
        switch ($name) {
            case 'insert_example';
            require_once $path . '/SDFHookNodeInsertTaskExample.php';
            return new SDFHookNodeInsertTaskExample();
            break;

            default:
                return null;
        }
    }
}