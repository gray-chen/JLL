
abstract class $SDF$HookNodeFormOp extends SDFHookEntityFormOp {

    protected function createTask($name) {
        $path = "$sdf$/classes/hooks/entity/nodes/tasks";
        switch ($name) {
            // Example
            /* case 'submit';
            require_once $path . '/$SDF$HookNodeSubmitTask.php';
            return new $SDF$HookNodeSubmitTask();
            break; */

            default:
                return null;
        }
    }
}