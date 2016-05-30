<?php

require_once 'sdf/classes/hooks/entity/base/SDFHookNodeFormOp.php';

class SDFHookNodeFormOpFactory extends SDFHookEntityFormOpFactory {

    public function createOp($op, $entity, $form, &$state) {
        $path = "sdf/classes/hooks/entity/nodes/ops";
        switch ($op) {
            case 'submit_example';
                require_once $path . '/SDFHookNodeSubmitExample.php';
                return new SDFHookNodeSubmitExample($entity, $form, $state, $op);
                break;

            default:
                return null;
        }
    }
}
