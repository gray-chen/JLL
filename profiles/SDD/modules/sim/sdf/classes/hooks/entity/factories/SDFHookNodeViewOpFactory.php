<?php

require_once 'sdf/classes/hooks/entity/base/SDFHookNodeViewOp.php';

class SDFHookNodeViewOpFactory extends SDFHookEntityViewOpFactory {

    public function createOp($op, $entity, $viewmode, $langcode) {
        $path = "sdf/classes/hooks/entity/nodes/ops";
        switch ($op) {
            case 'view';
                require_once $path . '/SDFHookNodeViewExample.php';
                return new SDFHookNodeViewExample($entity, $viewmode, $langcode, $op);
                break;

            default:
                return null;
        }
    }
}
