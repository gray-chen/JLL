
require_once '$sdf$/classes/hooks/entity/base/$SDF$HookNodeOp.php';

class $SDF$HookNodeOpFactory extends SDFHookEntityOpFactory {

    public function createOp($op, $entity) {
        $path = "$sdf$/classes/hooks/entity/nodes/ops";
        switch ($op) {
            // Example
            /* case 'insert';
                require_once $path . '/$SDF$HookNodeInsertExample.php';
                return new $SDF$HookNodeInsertExample($entity, $op);
                break; */

            default:
                return null;
        }
    }
}
