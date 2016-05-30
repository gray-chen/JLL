
require_once '$sdf$/classes/hooks/entity/base/$SDF$HookNodeViewOp.php';

class $SDF$HookNodeViewOpFactory extends SDFHookEntityViewOpFactory {

    public function createOp($op, $entity, $viewmode, $langcode) {
        $path = "$sdf$/classes/hooks/entity/nodes/ops";
        switch ($op) {
            // Example
            /* case 'view';
                require_once $path . '/$SDF$HookNodeViewExample.php';
                return new $SDF$HookNodeViewExample($entity, $viewmode, $langcode, $op);
                break; */

            default:
                return null;
        }
    }
}
