
abstract class $SDF$HookTermFormOp extends SDFHookEntityFormOp {

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
