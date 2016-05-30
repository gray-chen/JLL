
require_once '$sdf$/classes/hooks/entity/base/$SDF$HookTermFormOp.php';

class $SDF$HookTermFormOpFactory extends SDFHookEntityFormOpFactory {

    public function createOp($op, $entity, $form, &$state) {
        $path = "$sdf$/classes/hooks/entity/terms/ops";
        switch ($op) {
            case '';
                break;

            default:
                return null;
        }
    }
}
