<?php

require_once 'sdf/classes/hooks/entity/base/SDFHookUserViewOp.php';

class SDFHookUserViewOpFactory extends SDFHookEntityViewOpFactory {

    public function createOp($op, $entity, $viewmode, $langcode) {
        $path = "sdf/classes/hooks/entity/users/ops";
        switch ($op) {
            case 'view';
                require_once $path . '/SDFHookUserViewExample.php';
                return new SDFHookUserViewExample($entity, $viewmode, $langcode, $op);
                break;

            default:
                return null;
        }
    }
}
