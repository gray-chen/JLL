<?php

class SDFHookBlockDelta1Configure implements SDFHookBlockConfigureInterface {

    public function configure() {
        $form = array();

        $form['block_text'] = array(
            '#type' => 'textfield',
            '#title' => 'SDFHookBlockDelta1Configure added textfield'
        );

        return $form;
    }

}
