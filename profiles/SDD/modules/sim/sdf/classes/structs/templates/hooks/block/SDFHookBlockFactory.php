
require_once 'sdf/classes/hooks/block/base/SDFHookBlock.php';
require_once 'sdf/classes/hooks/block/interfaces/SDFHookBlockInterface.php';
require_once 'sdf/classes/hooks/block/interfaces/SDFHookBlockViewInterface.php';
require_once 'sdf/classes/hooks/block/interfaces/SDFHookBlockSaveInterface.php';
require_once 'sdf/classes/hooks/block/interfaces/SDFHookBlockConfigureInterface.php';

class $SDF$HookBlockFactory extends SDFFactory {

    /**
     * Create hook block
     *
     * @param string $delta
     * @param string $op
     * @param array $edit
     *     The submitted form data from the configuration form.
     *
     * @return SDFHookBlock
     */
    public function createBlock($delta, $op, $edit = array()) {
        $path = "$sdf$/classes/hooks/block/blocks";
        switch ($delta) {
            // Example
            /* case 'delta1';
                require_once $path . '/$SDF$HookBlockDelta1.php';
                return new $SDF$HookBlockDelta1($delta, $op, $edit);
                break; */

            default:
                return null;
        }
    }

}
