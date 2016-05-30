
abstract class $SDF$HookNodeViewOp extends SDFHookEntityViewOp {

    protected function createTask($name) {
        $path = "$sdf$/classes/hooks/entity/nodes/tasks";
        switch ($name) {
            // Example
            /* case 'view';
            require_once $path . '/$SDF$HookNodeViewTaskExample.php';
            return new $SDF$HookNodeViewTaskExample();
            break; */

            default:
                return null;
        }
    }
}