<?php

class SDFHookBlockDelta1View implements SDFHookBlockViewInterface {

    public function view() {
        $block = array();

        $block['content'] = 'SDFHookBlockDelta1View content.';

        return $block;
    }

}
