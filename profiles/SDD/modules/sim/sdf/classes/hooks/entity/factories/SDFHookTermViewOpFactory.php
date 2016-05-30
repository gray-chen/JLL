<?php

require_once 'sdf/classes/hooks/entity/base/SDFHookTermViewOp.php';

class SDFHookTermViewOpFactory extends SDFHookEntityViewOpFactory {

    public function createOp($op, $entity, $viewmode, $langcode) {
        $path = "sdf/classes/hooks/entity/terms/ops";
        switch ($op) {
            case 'view';
                require_once $path . '/SDFHookTermViewExample.php';
                return new SDFHookTermViewExample($entity, $viewmode, $langcode, $op);
                break;

            default:
                return null;
        }
    }
}
