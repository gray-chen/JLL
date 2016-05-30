<?php

require_once 'sdf/classes/hooks/entity/base/SDFHookTermOp.php';

class SDFHookTermOpFactory extends SDFHookEntityOpFactory {

    public function createOp($op, $entity) {
        $path = "sdf/classes/hooks/entity/terms/ops";
        switch ($op) {
            case '';
                break;

            default:
                return null;
        }
    }
}
