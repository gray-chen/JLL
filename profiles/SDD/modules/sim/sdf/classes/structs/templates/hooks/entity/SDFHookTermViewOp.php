
abstract class $SDF$HookTermViewOp extends SDFHookEntityViewOp {

    protected function createTask($name) {
        $path = "$sdf$/classes/hooks/entity/terms/tasks";
        switch ($name) {
            case '';
                break;

            default:
                return null;
        }
    }
}
