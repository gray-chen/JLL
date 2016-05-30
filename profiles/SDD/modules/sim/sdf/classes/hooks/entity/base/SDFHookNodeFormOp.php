<?php

abstract class SDFHookNodeFormOp extends SDFHookEntityFormOp {

    protected function createTask($name) {
        $path = "sdf/classes/hooks/entity/nodes/tasks";
        switch ($name) {
            case 'submit';
            require_once $path . '/SDFHookNodeSubmitTask.php';
            return new SDFHookNodeSubmitTask();
            break;

            default:
                return null;
        }
    }
}