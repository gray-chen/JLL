
require_once 'sdf/classes/hooks/form/interfaces/SDFHookFormAlterInterface.php';

class $SDF$HookFormAlterFactory extends SDFFactory {

    /**
     * Create form alter object
     *
     * @param string $name
     *
     * @return SDFHookFormAlterInterface
     */
    public function createAlter($name) {
        $path = '$sdf$/classes/hooks/form/alters';
        switch ($name) {
            // Example
            /* case 'homepage_alter';
                require_once $path . '/$SDF$HookHomepageNodeFormAlter.php';
                return new $SDF$HookHomepageNodeFormAlter($form, $formState, $formId);
                break; */
            default:
                return null;
        }
        break;
    }

}
