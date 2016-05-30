
require_once 'sdf/classes/hooks/form/base/SDFHookFormAlter.php';

class $SDF$HookFormFactory extends SDFFactory {

    /**
     * Create form alter object
     *
     * @param array $form
     * @param array $formState
     * @param string $formId
     *
     * @return SDFHookFormAlter
     */
    public function createForm(&$form, $formState, $formId) {
        $path = '$sdf$/classes/hooks/form/forms';
        switch ($formId) {
            // Example
            /* case 'homepage_node_form';
                require_once $path . '/$SDF$HookHomepageNodeForm.php';
                return new $SDF$HookHomepageNodeForm($form, $formState, $formId);
                break; */

            default:
                // None form id matches, give an empty form to do nothing.
                require_once 'sdf/classes/hooks/form/forms/SDFHookNoneForm.php';
                return new SDFHookNoneForm($form, $formState, $formId);
        }
    }

}
