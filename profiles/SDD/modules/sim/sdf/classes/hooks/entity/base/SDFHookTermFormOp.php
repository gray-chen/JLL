<?php

abstract class SDFHookTermFormOp extends SDFHookEntityFormOp {

    protected function createTask($name) {
        $path = "sdf/classes/hooks/entity/terms/tasks";
        switch ($name) {
            case '';
                break;

            default:
                return null;
        }
    }
}
