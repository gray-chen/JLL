<?php

interface SDFHookBlockConfigureInterface extends SDFHookBlockInterface {

    /**
     * Define a configuration form for a block.
     *
     * @return array Drupal form
     */
    public function configure();

}