<?php

abstract class SDFHookTermOp extends SDFHookEntityOp {

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