
require_once '$sdf$/classes/hooks/entity/base/$SDF$HookTermOp.php';

class $SDF$HookTermOpFactory extends SDFHookEntityOpFactory {

    public function createOp($op, $entity) {
        $path = "$sdf$/classes/hooks/entity/terms/ops";
        switch ($op) {
            case '';
                break;

            default:
                return null;
        }
    }
}
