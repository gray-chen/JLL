<?php

require_once 'sdf/classes/hooks/entity/base/SDFHookUserOp.php';

class SDFHookUserOpFactory extends SDFHookEntityOpFactory {

    public function createOp($op, $entity) {
        $path = "sdf/classes/hooks/entity/users/ops";
        switch ($op) {
            case '';
                break;

            default:
                return null;
        }
    }
}
