
require_once '$sdf$/classes/hooks/entity/base/$SDF$HookUserOp.php';

class $SDF$HookUserOpFactory extends SDFHookEntityOpFactory {

    public function createOp($op, $entity) {
        $path = "$sdf$/classes/hooks/entity/users/ops";
        switch ($op) {
            case '';
                break;

            default:
                return null;
        }
    }
}
