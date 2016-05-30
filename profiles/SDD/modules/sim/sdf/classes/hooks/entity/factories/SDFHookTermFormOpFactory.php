<?php

require_once 'sdf/classes/hooks/entity/base/SDFHookTermFormOp.php';

class SDFHookTermFormOpFactory extends SDFHookEntityFormOpFactory {

    public function createOp($op, $entity, $form, &$state) {
        $path = "sdf/classes/hooks/entity/terms/ops";
        switch ($op) {
            case '';
                break;

            default:
                return null;
        }
    }
}
