<?php

require_once 'sdf/classes/hooks/form/base/SDFHookFormAlter.php';

class SDFHookFormFactory extends SDFFactory {

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
        $path = 'sdf/classes/hooks/form/forms';
        switch ($formId) {
            case 'homepage_node_form';
                require_once $path . '/SDFHookHomepageNodeForm.php';
                return new SDFHookHomepageNodeForm($form, $formState, $formId);
                break;

            default:
                require_once $path . '/SDFHookNoneForm.php';
                return new SDFHookNoneForm($form, $formState, $formId);
        }
    }

}
