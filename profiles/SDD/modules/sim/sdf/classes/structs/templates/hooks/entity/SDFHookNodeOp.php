
abstract class $SDF$HookNodeOp extends SDFHookEntityOp {

    protected function createTask($name) {
        $path = "$sdf$/classes/hooks/entity/nodes/tasks";
        switch ($name) {
            // Example
            /* case 'insert';
            require_once $path . '/$SDF$HookNodeInsertTaskExample.php';
            return new $SDF$HookNodeInsertTaskExample();
            break; */

            default:
                return null;
        }
    }
}