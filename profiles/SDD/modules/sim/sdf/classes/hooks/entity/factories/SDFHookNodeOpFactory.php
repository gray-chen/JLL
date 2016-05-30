<?php

require_once 'sdf/classes/hooks/entity/base/SDFHookNodeOp.php';

class SDFHookNodeOpFactory extends SDFHookEntityOpFactory {

    public function createOp($op, $entity) {
        $path = "sdf/classes/hooks/entity/nodes/ops";
        switch ($op) {
            case 'insert';
                require_once $path . '/SDFHookNodeInsertExample.php';
                return new SDFHookNodeInsertExample($entity, $op);
                break;

            default:
                return null;
        }
    }
}
