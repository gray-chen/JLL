
require_once '$sdf$/classes/hooks/entity/base/$SDF$HookUserViewOp.php';

class $SDF$HookUserViewOpFactory extends SDFHookEntityViewOpFactory {

    public function createOp($op, $entity, $viewmode, $langcode) {
        $path = "$sdf$/classes/hooks/entity/users/ops";
        switch ($op) {
            case '';
                break;

            default:
                return null;
        }
    }
}
