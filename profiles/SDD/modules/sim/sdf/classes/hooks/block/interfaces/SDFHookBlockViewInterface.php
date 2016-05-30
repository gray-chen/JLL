<?php

interface SDFHookBlockViewInterface extends SDFHookBlockInterface {

    /**
     * Return a rendered or renderable view of a block.
     *
     * @return array Drupal block
     */
    public function view();

}