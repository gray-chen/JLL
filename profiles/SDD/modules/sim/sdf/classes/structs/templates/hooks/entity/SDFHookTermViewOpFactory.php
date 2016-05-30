
require_once '$sdf$/classes/hooks/entity/base/$SDF$HookTermViewOp.php';

class SDFHookTermViewOpFactory extends SDFHookEntityViewOpFactory {

    public function createOp($op, $entity, $viewmode, $langcode) {
        $path = "$sdf$/classes/hooks/entity/terms/ops";
        switch ($op) {
            case '';
                break;

            default:
                return null;
        }
    }
}
