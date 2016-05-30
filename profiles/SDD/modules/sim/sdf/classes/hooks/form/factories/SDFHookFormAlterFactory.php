<?php

require_once 'sdf/classes/hooks/form/interfaces/SDFHookFormAlterInterface.php';

class SDFHookFormAlterFactory extends SDFFactory {

    /**
     * Create form alter object
     *
     * @param string $name
     *
     * @return SDFHookFormAlterInterface
     */
    public function createAlter($name) {
        $path = 'sdf/classes/hooks/form/alters';
        switch ($name) {
            case 'homepage_alter';
                require_once $path . '/SDFHookHomepageNodeFormAlter.php';
                return new SDFHookHomepageNodeFormAlter($form, $formState, $formId);
                break;
            default:
                return null;
        }
        break;
    }

}
