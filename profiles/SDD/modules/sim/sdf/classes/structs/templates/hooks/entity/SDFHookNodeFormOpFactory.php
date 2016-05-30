
require_once '$sdf$/classes/hooks/entity/base/$SDF$HookNodeFormOp.php';

class $SDF$HookNodeFormOpFactory extends SDFHookEntityFormOpFactory {

    public function createOp($op, $entity, $form, &$state) {
        $path = "$sdf$/classes/hooks/entity/nodes/ops";
        switch ($op) {
            // Example
            /* case 'submit';
                require_once $path . '/$SDF$HookNodeSubmitExample.php';
                return new $SDF$HookNodeSubmitExample($entity, $form, $state, $op);
                break; */

            default:
                return null;
        }
    }
}
