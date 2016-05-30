<?php

class SDFHookHomepageNodeFormAlter implements SDFHookFormAlterInterface {

    public function alter(&$form, $formState, $formId) {
        $form['test'] = array(
            '#type' => 'textfield',
            '#title' => 'HomepageNodeFormAlter added a textfield',
        );
    }

}
