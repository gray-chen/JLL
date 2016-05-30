
require_once '$sdf$/classes/hooks/entity/base/$SDF$HookUserFormOp.php';

class $SDF$HookUserFormOpFactory extends SDFHookEntityFormOpFactory {

    public function createOp($op, $entity, $form, &$state) {
        $path = "$sdf$/classes/hooks/entity/users/ops";
        switch ($op) {
            case '';
                break;

            default:
                return null;
        }
    }
}
