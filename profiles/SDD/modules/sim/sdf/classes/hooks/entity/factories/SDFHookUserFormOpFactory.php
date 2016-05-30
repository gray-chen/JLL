<?php

require_once 'sdf/classes/hooks/entity/base/SDFHookUserFormOp.php';

class SDFHookUserFormOpFactory extends SDFHookEntityFormOpFactory {

    public function createOp($op, $entity, $form, &$state) {
        $path = "sdf/classes/hooks/entity/users/ops";
        switch ($op) {
            case '';
                break;

            default:
                return null;
        }
    }
}
