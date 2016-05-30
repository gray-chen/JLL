<?php

interface SDFHookBlockSaveInterface extends SDFHookBlockInterface {

    /**
     * Save the block-specific configuration settings defined.
     *
     * @param array $edit The submitted form data from the configuration form.
     */
    public function save(array $edit);

}